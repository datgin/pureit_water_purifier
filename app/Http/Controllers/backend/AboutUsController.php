<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class AboutUsController extends Controller
{
    public function index(Request $request)
    {
        return view('backend.about-us.index');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $credentials = Validator::make($request->all(), [
            'data' => 'nullable|array',
            'data.*.title' => 'required|max:255',
            'data.*.description' => 'nullable|max:255',
            'data.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        if ($credentials->fails()) {
            return response()->json([
                'success' => false,
                'message' => $credentials->errors()->first(),
            ], 422);
        }
    }
}
