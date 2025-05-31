<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // Lấy sản phẩm nổi bật
        $highlightProducts = Product::orderBy('view_count', 'desc')->get();
        // dd($highlightProducts);

        // Lấy sản phẩm mới nhất
        $latesProducts = Product::latest()->get();

        // Lấy 10 sản phẩm mới nhất
        $newProduct = Product::latest()->take(6)->get();

        return view('frontend.pages.home', compact('highlightProducts', 'latesProducts', 'newProduct'));
    }
}