<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::withCount('products');

            return DataTables::of($data)
                ->addColumn('checkbox', function ($row) {
                    return '<input type="checkbox" class="select-item" value="' . $row->id . '">';
                })
                ->editColumn('logo', function ($row) {
                    return '<img src="' . showImage($row->logo) . '" width="50"/>';
                })
                ->editColumn('name', function ($row) {
                    return '<a href="' . route('admin.categories.save', $row->id) . '"><strong>' . e($row->name) . '</strong></a>';
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format('d/m/Y H:i');
                })
                ->addColumn('product_count', function ($row) {
                    return $row->products_count;
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
                    <a href="' . route('admin.categories.save', $row->id) . '" class="btn btn-sm btn-primary" title="Sửa">
                        <i class="fas fa-edit"></i>
                    </a>
                    <button class="btn btn-sm btn-danger btn-delete" data-id="' . $row->id . '" title="Xóa">
                        <i class="fas fa-trash"></i>
                    </button>';
                })
                ->rawColumns(['checkbox', 'name', 'actions', 'status', 'logo'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('backend.category.index');
    }

    public function save($id = null)
    {

        $category = null;

        if ($id) {
            $category = Category::findOrFail($id);
        }

        return view('backend.category.save', compact('category'));
    }

    private function validate($request, $id = null)
    {
        $credentials = Validator::make($request->all(), [
            'name' => "required|max:255|string|unique:categories,name,{$id}",
            'slug' => "required|max:255|string|unique:categories,slug,{$id}",
            'description' => 'nullable|max:255|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'seo_title' => 'nullable|max:255|string',
            'seo_description' => 'nullable|string',
            'seo_keywords' => 'nullable|max:255|string',
            'status' => 'nullable',
            'location' => 'nullable|int|numeric|min:0'
        ]);

        if ($credentials->fails()) {
            return [
                'success' => false,
                'message' =>  $credentials->errors()->first()
            ];
        }

        return $credentials->validated();
    }

    public function store(Request $request)
    {
        $credentials = $this->validate($request);

        if (!empty($credentials['success']) && !$credentials['success']) {
            return response()->json($credentials, 422);
        }

        $uploadImage = null;

        try {

            if ($request->hasFile('logo')) {
                $uploadImage   = uploadImages('logo', 'category', false, false);
                $credentials['logo'] = $uploadImage;
            }

            if (!empty($credentials['seo_keywords'])) {
                $credentials['seo_keywords'] = explode(',', $credentials['seo_keywords']);
            }

            Category::create($credentials);

            session()->flash('success', 'Thêm mới danh mục thành công.');

            return response()->json(['success' => true], 201);
        } catch (\Exception $e) {
            logger('Category(store): ' . $e->getMessage());

            if (!empty($uploadImage)) {
                deleteImage($uploadImage);
            }

            return response()->json(['success' => false, 'message' => 'Đã có lỗi xảy ra, vui lòng thử lại sau!'], 400);
        }
    }

    public function update(Request $request, string $id)
    {
        $credentials = $this->validate($request, $id);

        if (!empty($credentials['success']) && !$credentials['success']) {
            return response()->json($credentials, 422);
        }

        $category = Category::findOrFail($id);
        $uploadImage = null;
        $oldImage = $category->logo;

        try {
            if ($request->hasFile('logo')) {
                $uploadImage = uploadImages('logo', 'category', false, false);
                $credentials['logo'] = $uploadImage;
            }

            if (!empty($credentials['seo_keywords'])) {
                $credentials['seo_keywords'] = explode(',', $credentials['seo_keywords']);
            }

            if ($category->update($credentials)) {
                if (!empty($uploadImage)) {
                    deleteImage($oldImage);
                }
            }

            session()->flash('success', 'Cập nhật danh mục thành công.');
            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            logger('Category(update): ' . $e->getMessage());

            if (!empty($uploadImage)) {
                deleteImage($uploadImage);
            }

            return response()->json([
                'success' => false,
                'message' => 'Đã có lỗi xảy ra, vui lòng thử lại sau!'
            ], 500);
        }
    }


    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        if ($category->delete()) {
            deleteImage($category->logo);
        }

        return response()->json(['success' => true, 'message' => 'Xóa danh mục thành công.']);
    }

    public function changeStatus(string $id)
    {
        $category = Category::query()->findOrFail($id);

        $category->status = !$category->status;

        $category->save();

        return response()->json(['message' => "Thay đổi trạng thái thành công."]);
    }
}
