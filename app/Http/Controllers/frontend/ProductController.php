<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $products = Product::where('category_id', $category->id)
            ->where('status', 1)
            ->get();
        return view('frontend.pages.shop', compact('products', 'category'));
    }

    public function detail($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        return view('frontend.pages.detail', compact('product'));
    }
}
