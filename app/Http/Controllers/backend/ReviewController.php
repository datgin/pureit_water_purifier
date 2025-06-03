<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CustomerReview;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = CustomerReview::select('*');

            return DataTables::of($query)
                ->addColumn('checkbox', function ($row) {
                    return '<input type="checkbox" class="select-item" value="' . $row->id . '">';
                })
                ->editColumn('name', function ($row) {
                    return "<strong class='edit'
                            data-id='{$row->id}'
                            data-name='{$row->name}'
                            data-address='{$row->address}'
                            data-image='{$row->image}'
                            data-description='{$row->description}'>
                            {$row->name}
                        </strong>";
                })
                ->editColumn('description', function ($row) {
                    return "<div>" . Str::limit($row->description, 50) . "</div>";
                })
                ->addColumn('address', function ($row) {
                    return $row->address ?? ''; // nếu có trường address trong DB
                })
                ->addColumn('actions', function ($row) {
                    // Tạo nút Edit/Delete hoặc tương tự
                    return '<a href="' . route('admin.reviews.edit', $row->id) . '" class="btn btn-sm btn-primary">Sửa</a>
                        <button data-id="' . $row->id . '" class="btn btn-sm btn-danger btn-delete">Xóa</button>';
                })
                ->rawColumns(['checkbox', 'name', 'description', 'actions']) // cho phép HTML
                ->make(true);
        }

        return view('backend.review-customer.index');
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
        $customerReview = new CustomerReview();
        $customerReview->name = $request->name;
        $customerReview->address = $request->address;
        $customerReview->description = $request->description ?? '';

        // Nếu có ảnh, lưu ảnh vào thư mục 'functions'
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();

            $destinationPath = public_path('storage/review');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);

            $review = 'review/' . $filename;

            $customerReview->image =  $review;
        }

        // Lưu vào database
        $customerReview->save();

        return response()->json([
            'message' => 'Thêm mới thành công!',
            'data' => $customerReview
        ], 201);
    } 
    public function update(Request $request, CustomerReview $customerReview)
    {

        $customerReview = CustomerReview::find($request->id);

        if (!$customerReview) {

        }

        $customerReview->name = $request->name;
        $customerReview->address = $request->address;
        $customerReview->description = $request->description ?? '';

        if ($request->hasFile('image')) {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '_' . $file->getClientOriginalName();

                $destinationPath = public_path('storage/review');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }

                $file->move($destinationPath, $filename);

                $review = 'review/' . $filename;

                $customerReview->image =  $review;
            }
        }

        $customerReview->save();

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
