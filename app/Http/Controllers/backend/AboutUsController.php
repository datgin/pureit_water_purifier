<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class AboutUsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = AboutUs::select('*');

            return DataTables::of($query)
                ->addColumn('checkbox', function ($row) {
                    return '<input type="checkbox" class="select-item" value="' . $row->id . '">';
                })
                ->editColumn('title', function ($row) {
                    return "<strong class='edit'
                            data-id='{$row->id}'
                            data-title='{$row->title}'
                            data-image='{$row->image}'
                            data-description='{$row->description}'>
                            {$row->title}
                        </strong>";
                })
                ->editColumn('description', function ($row) {
                    return "<div>" . Str::limit($row->description, 50) . "</div>";
                })


                ->rawColumns(['checkbox', 'title', 'description']) // cho phép HTML
                ->make(true);
        }

        return view('backend.about-us.index');
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
        $aboutUs = new AboutUs();
        $aboutUs->title = $request->title;
        $aboutUs->description = $request->description ?? '';

        // Nếu có ảnh, lưu ảnh vào thư mục 'functions'
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();

            $destinationPath = public_path('storage/aboutus');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);

            $review = 'aboutus/' . $filename;

            $aboutUs->image =  $review;
        }

        // Lưu vào database
        $aboutUs->save();

        return response()->json([
            'message' => 'Thêm mới thành công!',
            'data' => $aboutUs
        ], 201);
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
    public function update(Request $request, AboutUs $aboutUs)
    {

        $aboutUs = AboutUs::find($request->id);

        if (!$aboutUs) {

        }
        $aboutUs->title = $request->title;

        $aboutUs->description = $request->description ?? '';

        if ($request->hasFile('image')) {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '_' . $file->getClientOriginalName();

                $destinationPath = public_path('storage/aboutus');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }

                $file->move($destinationPath, $filename);

                $review = 'aboutus/' . $filename;

                $aboutUs->image =  $review;
            }
        }

        $aboutUs->save();

        return response()->json([
            'message' => 'Sửa thành công!',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
