<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Slider;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::query()->latest()->get();

        $products = Product::query()
            ->whereHas('category', function ($q) {
                $q->where('status', 1);
            })
            ->with('category')
            ->where(['status' => 1, 'is_featured' => 1])
            ->get();

        return view('frontend.pages.home', compact('products', 'sliders'));
    }
}