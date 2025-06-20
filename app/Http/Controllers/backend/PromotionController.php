<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function index()
    {
        $promotion = Promotion::first();

        return view('backend.promotion.index', compact('promotion'));

    }

    public function store(Request $request)
    {
        $data = [
            'title' => $request->input('title'),
            'start_date' => $request->filled('start_date') ? $request->input('start_date') : null,
            'end_date' => $request->filled('end_date') ? $request->input('end_date') : null,
            'offers' => $request->input('offers') ? array_filter($request->input('offers')) : [],
            'commitments' => $request->input('commitments') ? array_filter($request->input('commitments')) : [],
        ];
        // dd($request->all());

        $promotion = Promotion::first();

        if ($promotion) {
            // Nếu đã có, thì update
            $promotion->update($data);
        } else {
            // Nếu chưa có, thì tạo mới
            Promotion::create($data);
        }

        return redirect()->back()->with('success', 'Lưu khuyến mãi thành công!');

    }
}