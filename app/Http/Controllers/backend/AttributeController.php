<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
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
            return datatables()->of(Attribute::query()->with('attributeValues'))
                ->editColumn('name', function ($row) {
                    return "
                    <a href=" . route('admin.attributes.save', $row->id) . "><strong>$row->name</strong></a>
                    ";
                })
                ->addColumn('teams', function ($row) {
                    return $row->attributeValues->isNotEmpty() ? $row->attributeValues->pluck('value')->implode(', ') : '------';
                })
                ->addColumn('checkbox', function ($row) {
                    return '<input type="checkbox" class="select-item" value="' . $row->id . '">';
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format('d/m/Y H:i');
                })
                ->editColumn('status', function ($row) {
                    $checked = $row->status ? 'checked' : '';
                    return '
                        <label class="switch" data-id=' . $row->id . '>
                            <input name="is_featured" type="checkbox" value="1" ' . $checked . '>
                            <span class="slider round"></span>
                        </label>
                    ';
                })
                ->addColumn('actions', function ($row) {
                    return '
                    <a href="' . route('admin.attributes.save', $row->id) . '" class="btn btn-sm btn-primary" title="Sửa">
                        <i class="fas fa-edit"></i>
                    </a>
                    <button class="btn btn-sm btn-danger btn-delete" data-id="' . $row->id . '" title="Xóa">
                        <i class="fas fa-trash"></i>
                    </button>';
                })
                ->addIndexColumn()
                ->rawColumns(['teams', 'name', 'checkbox', 'actions', 'status'])
                ->make(true);
        }

        return view('backend.attribute.index');
    }

    public function save($id = null)
    {
        $attribute = null;

        if (!empty($id)) {
            $attribute = Attribute::query()->with('values')->findOrFail($id);
        }

        return view('backend.attribute.save', compact('attribute'));
    }

    private function validate($request, $id = null)
    {
        $crendentials = Validator::make($request->all(), [
            'name' => "required|unique:attributes,name,{$id}",
            'slug' => "required|unique:attributes,slug,{$id}",
            'status' => "required|in:0,1",
        ]);

        if ($crendentials->fails()) {
            return [
                'success' => false,
                'message' => $crendentials->errors()->first(),
            ];
        }

        return $crendentials->validated();
    }

    private function values($attribute, $values, $newValues)
    {
        $existingValues = $attribute->values;

        // Cập nhật hoặc xoá value cũ
        foreach ($existingValues as $value) {
            if (isset($values[$value->id])) {
                $value->update([
                    'value' => $values[$value->id]
                ]);
            } else {
                $value->delete();
            }
        }

        // Thêm mới các value
        foreach ($newValues as $val) {
            if (!empty(trim($val))) {
                $attribute->values()->create([
                    'value' => $val
                ]);
            }
        }
    }


    public function store(Request $request)
    {
        $credentials = $this->validate($request);

        if (isset($credentials['success']) && !$credentials['success']) {
            return response()->json($credentials, 422);
        }

        $attribute = Attribute::create($credentials);

        $this->values($attribute, $request->input('values', []), $request->input('new_values', []));

        return response()->json(['success' => true]);
    }

    public function update(Request $request, string $id)
    {
        $credentials = $this->validate($request, $id);

        if (isset($credentials['success']) && !$credentials['success']) {
            return response()->json($credentials, 422);
        }

        if (!$attribute = Attribute::with('values')->find($id)) {
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy bản ghi trên hệ thống!'
            ], 404);
        }

        $attribute->update($credentials);

        $this->values($attribute, $request->input('values', []), $request->input('new_values', []));

        return response()->json(['success' => true]);
    }
}
