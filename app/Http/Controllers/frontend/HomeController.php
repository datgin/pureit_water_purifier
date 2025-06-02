<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::query()
            ->whereHas('category', function ($q) {
                $q->where('status', 1);
            })
            ->with('category')
            ->where(['status' => 1, 'is_featured' => 1])
            ->get();

        return view('frontend.pages.home', compact('products'));
    }
}