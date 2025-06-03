<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function product($categoryPath, $productPath = null)
    {
        if ($productPath) {
            $product = Product::with(['images', 'category', 'attributeValues.attribute'])
                ->where('slug', $productPath)
                ->where('status', 1)
                ->firstOrFail();

            // Tổng hợp ảnh chính + ảnh phụ
            $images = array_merge([$product->image], $product->images->pluck('image')->toArray());

            $attributeValues = $product->attributeValues;

            // Lấy sản phẩm liên quan (cross-sell hoặc cùng danh mục)
            $relatedProducts = $this->getRelatedProducts($product);

            return view('frontend.pages.detail', compact(
                'product',
                'images',
                'attributeValues',
                'relatedProducts'
            ));
        }

        // Hiển thị danh sách sản phẩm trong danh mục
        $category = Category::where('slug', $categoryPath)
            ->where('status', 1)
            ->firstOrFail();

        $products = Product::with('category')
            ->where('category_id', $category->id)
            ->where('status', 1)
            ->paginate(12);

        return view('frontend.pages.shop', compact('category', 'products'));
    }

    protected function getRelatedProducts(Product $product)
    {
        if (!empty($product->cross_sell)) {
            return Product::whereIn('id', $product->cross_sell)
                ->where('status', 1)
                ->get();
        }

        return Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('status', 1)
            ->whereHas('category', function ($q) {
                $q->where('status', 1);
            })
            ->get();
    }
}
