<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\CustomerReview;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('s') && trim($request->s) !== '') {
            $keyword = trim($request->s);

            $products = Product::with('category')
                ->where('name', 'like', "%{$keyword}%")
                ->where('status', 1)
                ->paginate(12);
            return view('frontend.pages.search', compact('products', 'keyword'));
        }
        $sliders = Slider::query()->latest()->get();

        $products = Product::query()
            ->whereHas('category', function ($q) {
                $q->where('status', 1);
            })
            ->with('category')
            ->where(['status' => 1, 'is_featured' => 1])
            ->take(8)
            ->get();
        // dd($products);

        // Lấy sp lõi lọc
        $replacementFilters = Product::query()
            ->whereHas('category', function ($q) {
                $q->where('status', 1)
                    ->where('slug', 'loi-loc-thay-the');  
            })
            ->with('category')
            ->where('status', 1)
            ->get();


        $customerReview = CustomerReview::query()->get();
        // dd($customerReview);
        $aboutUs = AboutUs::query()->get();

        return view('frontend.pages.home', compact('products', 'sliders', 'customerReview', 'aboutUs', 'replacementFilters'));
    }
}
