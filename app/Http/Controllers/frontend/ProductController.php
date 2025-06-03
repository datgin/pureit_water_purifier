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

        if (!empty($productPath)) {
            $product = Product::query()->with(['images', 'category', 'attributeValues.attribute'])->where(['slug' => $productPath, 'status' => 1])->firstOrFail();
            $images = array_merge([$product->image], $product->images->pluck('image')->toArray());
            $attributeValues = $product->attributeValues;

            return view('frontend.pages.detail', compact('images', 'product', 'attributeValues'));
        }

        $category = Category::query()
            ->where('slug', $categoryPath)
            ->firstOrFail();

        $products = Product::query()->with('category')->where(['category_id' => $category->id, 'status' => 1])->paginate(12);

        return view('frontend.pages.shop', compact('category', 'products'));
    }
}
