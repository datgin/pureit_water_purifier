<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AttributeValueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attribute = Attribute::where("slug", request('slug'))->firstOrFail();
        if (request()->ajax()) {
            DB::reconnect();
            return datatables()->of(AttributeValue::query()->select(['id', 'value', 'slug', 'description'])
                ->where('attribute_id', $attribute->id)
                ->get())
                ->addColumn('value', function ($row) {
                    $urlDestroy = route('admin.attribute-values.delete', $row);
                    return "
                    <strong class='text-primary'>$row->value</strong>
                    " . view('components.action', compact('row', 'urlDestroy')) . "
                    ";
                })
                ->addColumn('description', function ($row) {
                    return $row->description ?? '---';
                })
                ->addColumn('checkbox', function ($row) {
                    return '<input type="checkbox" class="row-checkbox" value="' . $row->id . '" />';
                })
                ->addIndexColumn()
                ->rawColumns(['value', 'description', 'checkbox'])
                ->make(true);
        }


        return view('backend.attribute-value.index', compact('attribute'));
    }


    public function store(Request $request)
    {
        $attributeValue = $request->validate([
            'value' => 'required|unique:attribute_values,value',
            'slug' => 'nullable|unique:attribute_values,slug',
            'description' => 'nullable|max:28|min:5',
            'attribute_id' => 'required|exists:attributes,id'
        ]);

        try {

            // Tạo slug nếu không có
            if (empty($attributeValue['slug'])) {
                $attributeValue['slug'] = Str::slug($attributeValue['value']);
            }

            $created = AttributeValue::create($attributeValue);

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
            'value' => 'required|unique:attribute_values,value,' . $id . '|max:28|min:3',
            'slug' => 'nullable|unique:attribute_values,slug,' . $id . '|max:28|min:3',
            'description' => 'nullable|max:28|min:5',
            'attribute_id' => 'required|exists:attributes,id'
        ]);

        try {
            // Tạo slug nếu không có
            if (empty($data['slug'])) {
                $data['slug'] = Str::slug($data['name']);
            }

            $attributeValue = AttributeValue::findOrFail($id);
            $attributeValue->update($data);

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Cập nhật thành công!',
                    'data' => $attributeValue
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
        try {
            $attributeValue = AttributeValue::findOrFail($id);
            $attributeValue->delete();
            return back()->with('success', 'Cập nhật thành công!');

        } catch (\Exception $th) {
            return back()->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }
}
