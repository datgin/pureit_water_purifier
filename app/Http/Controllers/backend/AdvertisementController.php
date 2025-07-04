<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $advertisement = Advertisement::first();
        // dd($advertisement);
        return view('backend.config.advertisement', compact('advertisement'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // // dd($request->all());
        $validate = $request->validate([
            'quantity' => 'nullable',
            'title' => 'nullable',
            'description' => 'nullable',
        ]);
        $advertisement = Advertisement::first();

        if ($advertisement) {
            // Nếu đã có, thì update
            $advertisement->update($validate);
        } else {
            // Nếu chưa có, thì tạo mới
            Advertisement::create($validate);
        }



        return back()->with('success', 'Cập nhật thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
