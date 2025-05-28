<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Keyword;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class ProductController extends Controller
{
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
        dd($request->all());

        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:products,slug',
            'description' => 'required|string',
            'category_id' => 'required|integer|exists:categories,id',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'description_short' => 'nullable|string|max:500',

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
                'price' => $request->price ?? 0,
                'image' => saveImage($request, 'image', 'products_main_images'),
                'description_short' => $request->description_short,
                'description' => $request->description,
                'title_seo' => $request->title_seo,
                'description_seo' => $request->description_seo,
                'keyword_seo' => $request->keyword_seo,
                'discount_type' => $request->discount_type ?? 'amount',
                'discount_value' => $request->discount_value ?? 0,
                'discount_start_date' => $request->discount_start_date,
                'discount_end_date' => $request->discount_end_date,
                'view_count' => 0, // default ban đầu
            ]);

            $product->keywords()->sync($arrayKeywords);

            // Xử lý album ảnh
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $fileName = time() . '_' . $image->getClientOriginalName();
                    $image->storeAs('public/product_album', $fileName);

                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_path' => "storage/product_album/$fileName"
                    ]);
                }
            }

            return redirect()->route('backend.producs.index')->with('success', 'Bài viết đã được thêm thành công');

        } catch (\Throwable $th) {
            // Ghi log hoặc xử lý lỗi
            Log::error('Lỗi khi tạo sản phẩm: ' . $th->getMessage());
            return back()->with('error', 'Đã xảy ra lỗi khi tạo sản phẩm!');
        }
    }
}