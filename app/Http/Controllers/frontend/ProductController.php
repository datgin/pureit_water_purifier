<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{

    public function list()
    {
        $products = Product::all();
        return view('frontend.pages.products.index', compact('products'));
    }

    public function detail($slug)
    {
        $product = Product::with('images')->where('slug', $slug)->firstOrFail();

        $product->increment('view_count');
        // dd($product);

        return view('frontend.pages.products.detail', compact('product'));
    }
}