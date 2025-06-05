<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Keyword;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SeoScoreProduct;
use App\RankmathSEOForLaravel\Services\SeoAnalyzer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {

            return DataTables::eloquent(Product::query()->with('category'))
                ->addColumn('checkbox', function ($row) {
                    return '<input type="checkbox" class="select-item" value="' . $row->id . '">';
                })
                ->addColumn('category', function ($row) {
                    return !empty($row->category) ? $row->category->name : 'N/A';
                })
                ->editColumn('image', function ($row) {
                    return '<img src="' . $row->image . '" width="50"/>';
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format('d/m/Y H:i');
                })
                ->editColumn('status', function ($row) {
                    $checked = $row->status ? 'checked' : '';
                    return '
                        <label class="switch" data-id=' . $row->id . '>
                            <input name="is_featured" type="checkbox" value="1" ' . $checked . '>
                            <span class="slider round"></span>
                        </label>
                    ';
                })
                ->addColumn('actions', function ($row) {
                    return '
                    <a href="' . route('admin.products.save', $row->id) . '" class="btn btn-sm btn-primary" title="Sửa">
                        <i class="fas fa-edit"></i>
                    </a>
                    <button class="btn btn-sm btn-danger btn-delete" data-id="' . $row->id . '" title="Xóa">
                        <i class="fas fa-trash"></i>
                    </button>';
                })
                ->rawColumns(['checkbox', 'actions', 'status', 'image'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('backend.products.index');
    }

    public function save($id = null)
    {

        $product = null;
        $crossSellProducts = [];
        $preloaded = [];
        $category = Category::query()->pluck('name', 'id')->toArray();
        $attributes = Attribute::query()->with('values')->get()->toArray();
        $selectedAttributeValues = [];

        if (!empty($id)) {
            $product = Product::query()->with([
                'category',
                'images',
                'attributeValues' => function ($q) {
                    $q->withPivot('attribute_id');
                }
            ])->findOrFail($id);

            foreach ($product->attributeValues as $value) {
                $selectedAttributeValues[$value->pivot->attribute_id][] = $value->id;
            }

            $preloaded = $product->images->map(fn($img) => [
                'id' => $img->id,
                'src' => $img->image,
            ]);

            $crossSellProducts = !empty($product->cross_sell) ? Product::query()->select(['id', 'name', 'image'])->whereIn('id', $product->cross_sell)->get() : [];
        }

        return view('backend.products.save', compact('product', 'category', 'preloaded', 'crossSellProducts', 'attributes', 'selectedAttributeValues'));
    }

    private function validate($request, $id = null)
    {

        $credentials = Validator::make($request->all(), [
            'name' => "required|max:255|unique:products,name,{$id}",
            'slug' => "required|max:255|unique:products,slug,{$id}",
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
            'discount_type' => 'nullable|in:percentage,amount',
            'discount_value' => 'nullable|numeric|min:0',
            'discount_start_date' => 'nullable|date_format:d/m/Y',
            'discount_end_date' => 'nullable|date_format:d/m/Y|after_or_equal:discount_start_date',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'seo_title' => 'nullable|string|max:60',
            'seo_description' => 'nullable|string|max:160',
            'seo_keywords' => 'nullable|string|max:255',
            'status' => 'nullable|boolean',
            'category_id' => 'required|integer|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'manual_vi' => 'nullable|file|mimes:pdf|max:10240',
            'manual_en' => 'nullable|file|mimes:pdf|max:10240',
            'is_featured' => 'nullable',
            'cross_sell' => 'nullable|array',
            'cross_sell.*' => 'exists:products,id',
            'keywords' => 'nullable',
            'keywords.*' => 'string|max:30',
            'features' => 'nullable|array',
            'features.*.title' => 'required|string|max:255',
            'features.*.content' => 'required|string|max:1000',
        ]);

        $credentials->after(function ($validator) use ($request) {
            $discountValue = $request->input('discount_value');
            $price = $request->input('price');

            // Rule 1: Nếu có discount_value > 0 mà không có price
            if (!is_null($discountValue) && $discountValue > 0 && (is_null($price) || $price === '')) {
                $validator->errors()->add('price', 'Bạn chưa nhập giá khi có giảm giá.');
            }

            // Rule 2: Nếu có start và end date mà không có discount_value > 0
            if (
                $request->filled('discount_start_date') &&
                $request->filled('discount_end_date') &&
                (is_null($discountValue) || $discountValue <= 0)
            ) {
                $validator->errors()->add('discount_value', 'Phải nhập giá trị giảm giá > 0 nếu có thời gian giảm.');
            }

            // ✅ Rule 3: Nếu có cả price và discount_value > 0 thì discount_value phải nhỏ hơn price
            if (!is_null($price) && !is_null($discountValue) && $discountValue > 0 && $price <= $discountValue) {
                $validator->errors()->add('discount_value', 'Giá khuyến mãi phải nhỏ hơn giá gốc.');
            }
        });

        if ($credentials->fails()) {
            return [
                'success' => false,
                'message' => $credentials->errors()->first(),
            ];
        }

        return $credentials->validated();
    }

    public function store(Request $request)
    {
        $credentials = $this->validate($request);

        if (isset($credentials['success']) && !$credentials['success']) {
            return response()->json($credentials, 422);
        }

        $attributeValues = $request->input('attribute_values', []);
        $uploadImage = null;
        $uploadManualVi = null;
        $uploadManualEn = null;
        $uploadImages = [];

        try {
            DB::beginTransaction();

            if ($request->hasFile('image')) {
                $uploadImage = uploadImages('image', 'product');
                $credentials['image'] = $uploadImage;
            }

            if ($request->hasFile('images')) {
                $uploadImages = uploadImages('images', 'product', false, true);
            }

            if ($request->hasFile('manual_vi')) {
                $uploadManualVi = savePdfFile('manual_vi');
                $credentials['manual_vi'] = $uploadManualVi;
            }

            if ($request->hasFile('manual_en')) {
                $uploadManualEn = savePdfFile('manual_en');
                $credentials['manual_en'] = $uploadManualEn;
            }

            if (!empty($credentials['seo_keywords'])) {
                $credentials['seo_keywords'] = explode(',', $credentials['seo_keywords']);
            }

            $product = Product::create($credentials);

            $this->images($product, $uploadImages);

            $this->attributeValues($product, $attributeValues);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            logger('ProductController(store): ' . $e->getMessage());

            deleteImage($uploadImage);
            deleteImage($uploadManualVi);
            deleteImage($uploadManualEn);

            array_map(function ($image) {
                deleteImage($image);
            }, $uploadImages);

            return response()->json([
                'success' => false,
                'message' => 'Đã có lỗi xảy ra, vui lòng thử lại sau!'
            ], 400);
        }

    }

    public function update(Request $request, string $id)
    {
        $credentials = $this->validate($request, $id);

        if (isset($credentials['success']) && !$credentials['success']) {
            return response()->json($credentials, 422);
        }

        $attributeValues = $request->input('attribute_values', []);

        $uploadImage = null;
        $uploadManualVi = null;
        $uploadManualEn = null;
        $uploadImages = [];

        try {
            DB::beginTransaction();

            $product = Product::findOrFail($id);

            $oldImage = $product->image;
            $oldManualVi = $product->manual_vi;
            $oldManualEn = $product->manual_en;

            if ($request->hasFile('image')) {
                $uploadImage = uploadImages('image', 'product');
                $credentials['image'] = $uploadImage;
            }

            if ($request->hasFile('images')) {
                $uploadImages = uploadImages('images', 'product', false, true);
            }

            if ($request->hasFile('manual_vi')) {
                $uploadManualVi = savePdfFile('manual_vi');
                $credentials['manual_vi'] = $uploadManualVi;
            }

            if ($request->hasFile('manual_en')) {
                $uploadManualEn = savePdfFile('manual_en');
                $credentials['manual_en'] = $uploadManualEn;
            }

            if (!empty($credentials['seo_keywords'])) {
                $credentials['seo_keywords'] = explode(',', $credentials['seo_keywords']);
            }

            $credentials['is_featured'] ??= 0;

            $credentials['discount_start_date'] = $request->filled('discount_start_date') ? $request->input('discount_start_date') : null;
            $credentials['discount_end_date'] = $request->filled('discount_end_date') ? $request->input('discount_end_date') : null;

            if ($product->update($credentials)) {
                if (!empty($uploadImage))
                    deleteImage($oldImage);
                if (!empty($uploadManualVi))
                    deleteImage($oldManualVi);
                if (!empty($uploadManualEn))
                    deleteImage($oldManualEn);
            }

            $this->images($product, $uploadImages, $request->old ?? []);

            $this->attributeValues($product, $attributeValues);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            logger('ProductController(update): ' . $e->getMessage());

            deleteImage($uploadImage);
            deleteImage($uploadManualVi);
            deleteImage($uploadManualEn);

            array_map(function ($image) {
                deleteImage($image);
            }, $uploadImages);

            return response()->json([
                'success' => false,
                'message' => 'Đã có lỗi xảy ra, vui lòng thử lại sau!'
            ], 400);
        }
    }

    private function attributeValues($product, $attributeValues)
    {
        if (count($attributeValues) > 0) {
            $syncData = [];

            foreach ($attributeValues as $attributeId => $valueIds) {
                foreach ($valueIds as $valueId) {
                    $syncData[$valueId] = ['attribute_id' => $attributeId];
                }
            }

            $product->attributeValues()->sync($syncData);
        } else {
            $product->attributeValues()->detach();
        }
    }


    private function images($product, $newImages, $oldImages = [])
    {
        // Lấy các ảnh hiện tại trong DB
        $currentImages = $product->images()->pluck('image', 'id')->toArray();

        // Duyệt tất cả ảnh hiện tại, nếu không nằm trong old thì xóa
        foreach ($currentImages as $id => $imagePath) {
            if (!in_array($id, $oldImages)) {
                deleteImage($imagePath); // xóa file khỏi storage
                $product->images()->where('id', $id)->delete(); // xóa record
            }
        }

        // Thêm ảnh mới
        if (!empty($newImages)) {
            $product->images()->createMany(
                collect($newImages)->map(fn($img) => ['image' => $img])->toArray()
            );
        }
    }


    // public function store(Request $request)
    // {


    //     // Xử lý giá trước khi tạo sản phẩm
    //     $price = str_replace(',', '', $request->price);
    //     $price = (float) $price;

    //     if (!empty($request->keywords)) {
    //         // Giải mã chuỗi JSON thành mảng

    //         $keywordsArray = json_decode($request->keywords, true);

    //         $keywords = array_map(fn($keyword) => $keyword['value'], $keywordsArray);

    //         // dd(vars: $tags);

    //         $arrayKeywords = [];

    //         foreach ($keywords as $item) {
    //             $keyword = Keyword::query()->updateOrCreate(['name' => $item], ['slug' => Str::slug($item)]);
    //             $arrayKeywords[] = $keyword->id;
    //         }
    //     }

    //     try {
    //         $product = Product::create([
    //             'category_id' => $request->category_id,
    //             'name' => $request->name,
    //             'slug' => $request->slug,
    //             'price' => $request->price,
    //             'image' => saveImage($request, 'image', 'products_main_images'),
    //             'description_short' => $request->description_short,
    //             'description' => $request->description,
    //             'title_seo' => $request->title_seo,
    //             'description_seo' => $request->description_seo,
    //             'discount_type' => $request->discount_type ?? 'amount',
    //             'discount_value' => $request->discount_value ?? 0,
    //             'discount_start_date' => $request->discount_start_date,
    //             'discount_end_date' => $request->discount_end_date,
    //             'view_count' => 0, // default ban đầu
    //         ]);

    //         $product->keywords()->sync($arrayKeywords);

    //         $images = [];

    //         if ($request->hasFile('images')) {
    //             $uploadedImages = uploadImages('images', 'album_product', false, true); // ['img1.jpg', 'img2.jpg']

    //             $images = array_map(fn($img) => ['image' => $img], $uploadedImages); // [['image' => 'img1.jpg'], ...]

    //             $product->images()->createMany($images);
    //         }

    //         // Sau khi blog đã được tạo và gán từ khóa, tag
    //         $focusKeyword = $product->keywords->first()->name ?? '';
    //         $analyzer = app(SeoAnalyzer::class);

    //         $analysisResult = $analyzer->analyze(
    //             $product->title_seo,
    //             $product->description,
    //             $focusKeyword,
    //             $product->description_seo ?? '',
    //             $product->slug
    //         );

    //         $analysis = collect($analysisResult->checks ?? []);
    //         $suggestions = collect($analysisResult->suggestions ?? []);
    //         $seoScoreValue = $this->calculateSeoScore($analysis, $suggestions);

    //         // Lưu điểm SEO
    //         $this->saveSEOScore($product, $seoScoreValue);

    //         return redirect()->route('admin.products.index')->with('success', 'Bài viết đã được thêm thành công');
    //     } catch (\Throwable $th) {
    //         // Ghi log hoặc xử lý lỗi
    //         Log::error('Lỗi khi tạo sản phẩm: ' . $th->getMessage());
    //         return back()->with('error', 'Đã xảy ra lỗi khi tạo sản phẩm!');
    //     }
    // }



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

    /**
     * Search products for cross-sell functionality
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchProducts(Request $request)
    {
        $search = $request->input('search', '');
        $page = $request->input('page', 1);
        $perPage = 12; // Số sản phẩm hiển thị mỗi trang
        $productId = $request->input('productId');

        $query = Product::query()
            ->select('id', 'name', 'image', 'price', 'discount_value')->where('id', '<>', $productId);

        if (!empty($search)) {
            $query->where('name', 'like', "%{$search}%");
        }

        $products = $query->paginate($perPage, ['*'], 'page', $page);

        // Format lại dữ liệu trả về
        $formattedProducts = $products->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'image' => $product->image,
                'price' => number_format($product->price) . 'đ',
                'discount_price' => $product->discount_value > 0
                    ? number_format($product->price * (1 - $product->discount_value / 100)) . 'đ'
                    : null
            ];
        });

        return response()->json([
            'data' => $formattedProducts,
            'current_page' => $products->currentPage(),
            'last_page' => $products->lastPage(),
            'per_page' => $products->perPage(),
            'total' => $products->total()
        ]);
    }
}
