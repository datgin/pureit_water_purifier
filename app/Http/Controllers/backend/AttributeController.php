<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            DB::reconnect();
            return datatables()->of(Attribute::query()->with('attributeValues')->latest()->get())
                ->addColumn('name', function ($row) {
                    // $urlEdit =  route('admin.attributes.edit', $row);
                    $urlDestroy = route('admin.attributes.delete', $row);
                    return "
                    <a href=" . route('admin.attribute-values.index', ['slug' => $row->slug]) . "><strong>$row->name</strong></a>
                    " . view('components.action', compact('row', 'urlDestroy')) . "
                    ";
                })
                ->addColumn('teams', function ($row) {
                    return $row->attributeValues->pluck('value')->implode(', ');
                })
                ->addColumn('checkbox', function ($row) {
                    return '<input type="checkbox" class="row-checkbox" value="' . $row->id . '" />';
                })
                ->addIndexColumn()
                ->rawColumns(['teams', 'name', 'checkbox'])
                ->make(true);
        }

        return view('backend.attribute.index');
    }

    public function store(Request $request)
    {
        $attribute = $request->validate([
            'name' => 'required|unique:attributes,name|max:28|min:3',
            'slug' => 'nullable|unique:attributes,slug|max:28|min:3'
        ]);

        try {
            // Tạo slug nếu không có
            if (empty($attribute['slug'])) {
                $attribute['slug'] = Str::slug($attribute['name']);
            }

            $created = Attribute::create($attribute);

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Thêm thành công',
                    'data' => $created
                ]);
            }

            return back()->with('success', 'Thêm thuộc tính thành công!');
        } catch (\Throwable $th) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Lỗi: ' . $th->getMessage()
                ], 500);
            }

            return back()->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|unique:attributes,name,' . $id . ',id|max:28|min:3',
            'slug' => 'nullable|unique:attributes,slug,' . $id . ',id|max:28|min:3'
        ]);

        try {
            // Tạo slug nếu không có
            if (empty($data['slug'])) {
                $data['slug'] = Str::slug($data['name']);
            }

            $attribute = Attribute::findOrFail($id);
            $attribute->update($data);

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Cập nhật thành công!',
                    'data' => $attribute
                ]);
            }

            return back()->with('success', 'Cập nhật thành công!');
        } catch (\Throwable $th) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Lỗi: ' . $th->getMessage()
                ], 500);
            }
            // Log::error($th);

            return back()->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }


    public function delete($id)
    {
        $attribute = Attribute::findOrFail($id);

        $attribute->delete();

        return back();
    }
}
