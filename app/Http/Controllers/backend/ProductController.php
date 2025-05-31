<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Keyword;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SeoScoreProduct;
use App\RankmathSEOForLaravel\Services\SeoAnalyzer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class ProductController extends Controller
{

    public function index(Request $request)
    {
        $products = Product::with(['category'])->get();
        return view('backend.products.index', compact('products'));
    }
    public function add()
    {
        $product = new Product();
        $product->keyword_ids = [];
        $category = Category::all();
        $keywords = Keyword::pluck('name')->toArray();

        return view('backend.products.create', compact('product', 'category', 'keywords'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:products,slug',
            'description' => 'required|string',
            'category_id' => 'required|integer|exists:categories,id',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'description_short' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',


            // SEO Fields
            'title_seo' => 'nullable|string|max:60', // Tối ưu: 50-60 ký tự
            'description_seo' => 'nullable|string|max:160', // Tối ưu: 120-160 ký tự

            // Discount fields
            'discount_type' => 'nullable|in:percentage,amount',
            'discount_value' => 'nullable|numeric|min:0',
            'discount_start_date' => 'nullable|date',
            'discount_end_date' => 'nullable|date|after_or_equal:discount_start_date',

            'keywords' => 'nullable',
            'keywords.*' => 'string|max:30',
        ]);

        // Xử lý giá trước khi tạo sản phẩm
        $price = str_replace(',', '', $request->price);
        $price = (float) $price;

        if (!empty($request->keywords)) {
            // Giải mã chuỗi JSON thành mảng

            $keywordsArray = json_decode($request->keywords, true);

            $keywords = array_map(fn($keyword) => $keyword['value'], $keywordsArray);

            // dd(vars: $tags);

            $arrayKeywords = [];

            foreach ($keywords as $item) {
                $keyword = Keyword::query()->updateOrCreate(['name' => $item], ['slug' => Str::slug($item)]);
                $arrayKeywords[] = $keyword->id;
            }

        }

        try {
            $product = Product::create([
                'category_id' => $request->category_id,
                'name' => $request->name,
                'slug' => $request->slug,
                'price' => $request->price,
                'image' => saveImage($request, 'image', 'products_main_images'),
                'description_short' => $request->description_short,
                'description' => $request->description,
                'title_seo' => $request->title_seo,
                'description_seo' => $request->description_seo,
                'discount_type' => $request->discount_type ?? 'amount',
                'discount_value' => $request->discount_value ?? 0,
                'discount_start_date' => $request->discount_start_date,
                'discount_end_date' => $request->discount_end_date,
                'view_count' => 0, // default ban đầu
            ]);

            $product->keywords()->sync($arrayKeywords);

            $images = [];

            if ($request->hasFile('images')) {
                $uploadedImages = uploadImages('images', 'album_product', false, true); // ['img1.jpg', 'img2.jpg']

                $images = array_map(fn($img) => ['image' => $img], $uploadedImages); // [['image' => 'img1.jpg'], ...]

                $product->images()->createMany($images);
            }

            // Sau khi blog đã được tạo và gán từ khóa, tag
            $focusKeyword = $product->keywords->first()->name ?? '';
            $analyzer = app(SeoAnalyzer::class);

            $analysisResult = $analyzer->analyze(
                $product->title_seo,
                $product->description,
                $focusKeyword,
                $product->description_seo ?? '',
                $product->slug
            );

            $analysis = collect($analysisResult->checks ?? []);
            $suggestions = collect($analysisResult->suggestions ?? []);
            $seoScoreValue = $this->calculateSeoScore($analysis, $suggestions);

            // Lưu điểm SEO
            $this->saveSEOScore($product, $seoScoreValue);

            return redirect()->route('admin.product.index')->with('success', 'Bài viết đã được thêm thành công');

        } catch (\Throwable $th) {
            // Ghi log hoặc xử lý lỗi
            Log::error('Lỗi khi tạo sản phẩm: ' . $th->getMessage());
            return back()->with('error', 'Đã xảy ra lỗi khi tạo sản phẩm!');
        }
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $category = Category::all();
        $keywords = Keyword::pluck('name')->toArray();

        $preloadedImages = $product->images->map(function ($img) {
            return [
                'id' => $img->id,
                'src' => asset('storage/' . $img->image),
            ];
        });
        return view('backend.products.edit', compact('product', 'category', 'keywords', 'preloadedImages'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:products,slug,' . $id,
            'description' => 'required|string',

            'category_id' => 'required|integer|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'description_short' => 'nullable|string|max:500',
            'price' => 'required|numeric|min:0',

            // SEO Fields
            'title_seo' => 'nullable|string|max:60',
            'description_seo' => 'nullable|string|max:160',

            // Discount fields
            'discount_type' => 'nullable|in:percentage,amount',
            'discount_value' => 'nullable|numeric|min:0',
            'discount_start_date' => 'nullable|date',
            'discount_end_date' => 'nullable|date|after_or_equal:discount_start_date',

            'keywords' => 'nullable',
            'keywords.*' => 'string|max:30',
        ]);

        $product = Product::findOrFail($id);

        $arrayKeywords = [];

        if (!empty($request->keywords)) {
            $keywordsArray = json_decode($request->keywords, true);
            $keywords = array_map(fn($keyword) => $keyword['value'], $keywordsArray);

            foreach ($keywords as $item) {
                $keyword = Keyword::updateOrCreate(['name' => $item], ['slug' => Str::slug($item)]);
                $arrayKeywords[] = $keyword->id;
            }
        }

        if ($request->hasFile('image')) {
            deleteImage($product->image);
            $product->image = saveImage($request, 'image', 'products_main_images');
        }

        // dd([
        //     $request->description,
        //     $request->description_short,

        // ]);

        // Cập nhật dữ liệu còn lại
        $product->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => $request->slug,
            'price' => $request->price ?? 0,
            'description_short' => $request->description_short,
            'description' => $request->description,
            'title_seo' => $request->title_seo,
            'description_seo' => $request->description_seo,
            'keyword_seo' => $request->keyword_seo,
            'discount_type' => $request->discount_type ?? 'amount',
            'discount_value' => $request->discount_value ?? 0,
            'discount_start_date' => $request->discount_start_date,
            'discount_end_date' => $request->discount_end_date,
        ]);

        // Đồng bộ keywords
        $product->keywords()->sync($arrayKeywords);

        // Cập nhật lại ảnh album nếu có
        if ($request->hasFile('images')) {
            // Xóa ảnh album cũ
            foreach ($product->images as $img) {
                deleteImage($img->image);
                $img->delete();
            }

            // Thêm ảnh mới
            $uploadedImages = uploadImages('images', 'album_product', false, true); // ['img1.jpg', ...]
            $images = array_map(fn($img) => ['image' => $img], $uploadedImages);
            $product->images()->createMany($images);
        }

        // Phân tích lại SEO (nếu cần)
        try {
            $focusKeyword = $product->keywords->first()->name ?? '';
            $analyzer = app(SeoAnalyzer::class);

            $analysisResult = $analyzer->analyze(
                $product->title_seo,
                $product->description,
                $focusKeyword,
                $product->description_seo ?? '',
                $product->slug
            );

            $analysis = collect($analysisResult->checks ?? []);
            $suggestions = collect($analysisResult->suggestions ?? []);
            $seoScoreValue = $this->calculateSeoScore($analysis, $suggestions);

            // Lưu điểm SEO
            $this->saveSEOScore($product, $seoScoreValue);
        } catch (\Throwable $th) {
            Log::warning('Lỗi khi phân tích SEO: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Sản phẩm đã được cập nhật thành công');
    }

    public function delete($id)
    {
        try {
            $product = Product::findOrFail($id);

            // Xóa ảnh nếu tồn tại
            if ($product->image && file_exists(public_path('storage/' . $product->image))) {
                unlink(public_path('storage/' . $product->image));
            }

            $product->delete();
            return response()->json([
                'success' => true,
                'message' => 'Xóa sản phẩm thành công!'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra: ',
            ], 500);
        }

    }


    // Tính điểm
    private function calculateSeoScore($analysis, $suggestions)
    {
        $allItems = collect($analysis)->merge($suggestions);

        $totalCriteria = $allItems->count();

        $successCount = $allItems->where('status', 'success')->count();
        $warningCount = $allItems->where('status', 'warning')->count();
        $failCount = $allItems->where('status', 'danger')->count();

        if ($totalCriteria === 0) {
            return 0;
        }

        $score = ($successCount * 1 + $warningCount * 0.5 + $failCount * 0) / $totalCriteria * 100;

        return round($score);
    }

    // Lưu điểm SEO
    public function saveSEOScore(Product $product, $seoScoreValue)
    {
        SeoScoreProduct::updateOrCreate(
            ['product_id' => $product->id],
            ['seo_score' => $seoScoreValue]
        );
    }

    public function getSeoAnalysis(Request $request, $id = null)
    {
        if (!$id) {
            return [
                'product' => null,
                'seoScore' => null,
                'keywords' => [],
                'analysis' => [],
                'suggestions' => [],
                'hasWarning' => false,
                'seoScoreValue' => 0,
            ];
        }

        $product = Product::findOrFail($id);


        $focusKeyword = $product->keywords->first()->name ?? '';

        $analyzer = app(SeoAnalyzer::class);
        // dd($blog->seo_title, $blog->content, $focusKeyword, $blog->seo_description ?? '', $blog->slug);

        $analysisResult = $analyzer->analyze($product->seo_title = '', $product->content, $focusKeyword, $product->seo_description ?? '', $product->slug);

        $analysis = collect($analysisResult->checks)->map(function ($item) {
            $status = $item['status'] ?? ($item['passed'] ? 'success' : 'warning');
            return array_merge($item, ['status' => $status]);
        })->toArray();

        $suggestions = collect($analysisResult->suggestions ?? [])->map(function ($item) {
            $status = $item['status'] ?? ($item['passed'] ? 'success' : 'info');
            return array_merge($item, ['status' => $status]);
        })->toArray();


        $seoScoreValue = $this->calculateSeoScore($analysis, $suggestions);
        $hasWarning = $seoScoreValue < 80 || collect($analysis)->contains(fn($item) => $item['passed'] === false);

        $seoScore = SeoScoreProduct::where('product_id', $product->id)->first();

        return [
            'pro$product' => $product,
            'seoScore' => $seoScore,
            'keywords' => $product->keywords,
            'analysis' => $analysis,
            'suggestions' => $suggestions,
            'hasWarning' => $hasWarning,
            'seoScoreValue' => $seoScoreValue,
        ];
    }

    public function getSeoAnalysisLive(Request $request)
    {
        // dd($request->toArray());
        $seoTitle = $request->title_seo ?? '';
        $content = $request->content ?? '';
        $slug = $request->slug ?? '';
        $seoDescription = $request->description_seo ?? '';
        $keywords = $request->input('keywords', []);
        $focusKeyword = is_array($keywords) ? ($keywords[0] ?? '') : $keywords;
        $short_description = $request->description_short ?? '';

        $analyzer = app(SeoAnalyzer::class);

        $analysisResult = $analyzer->analyze($seoTitle, $content, $focusKeyword, $seoDescription, $slug);
        $analysis = collect($analysisResult->checks)->map(function ($item) {
            $status = $item['status'] ?? ($item['passed'] ? 'success' : 'warning');
            return array_merge($item, ['status' => $status]);
        })->toArray();

        $suggestions = collect($analysisResult->suggestions ?? [])->map(function ($item) {
            $status = $item['status'] ?? ($item['passed'] ? 'success' : 'info');
            return array_merge($item, ['status' => $status]);
        })->toArray();

        $seoScoreValue = $this->calculateSeoScore($analysis, $suggestions);
        $hasWarning = $seoScoreValue < 80 || collect($analysis)->contains(fn($item) => $item['passed'] === false);

        $seoData = [
            'analysis' => $analysis,
            'suggestions' => $suggestions,
            'seoScoreValue' => $seoScoreValue,
            'hasWarning' => $hasWarning,
        ];

        $seoScoreValue = $seoData['seoScoreValue'] ?? 0;
        $seoColor = 'bg-danger'; // đỏ mặc định (dưới 50)
        $badgeClass = 'bg-danger';

        if ($seoScoreValue >= 80) {
            $seoColor = 'bg-success'; // xanh lá (tốt)
            $badgeClass = 'bg-success';
        } elseif ($seoScoreValue >= 50) {
            $seoColor = 'bg-warning'; // vàng (trung bình)
            $badgeClass = 'bg-warning text-dark';
        }

        // dd(vars: $seoData);

        $view = view('backend.products.seo', compact('seoData'))->render();
        return response()->json([
            'success' => true,
            'html' => $view,
            'seoScoreVal' => $seoScoreValue,
            'seoColor' => $seoColor,
            'badgeClass' => $badgeClass
        ]);
    }
}
