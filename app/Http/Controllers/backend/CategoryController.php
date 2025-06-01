<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::withCount('products')->get();

            return DataTables::of($data)
                ->addColumn('checkbox', function ($row) {
                    return '<input type="checkbox" class="select-item" value="' . $row->id . '">';
                })
                ->addColumn('name', function ($row) {
                    return '<a href="' . route('admin.category.edit', $row->id) . '"><strong>' . e($row->name) . '</strong></a>';
                })
                ->addColumn('product_count', function ($row) {
                    return $row->products_count;
                })
                ->addColumn('actions', function ($row) {
                    return '

                    <button class="btn btn-sm btn-danger btn-delete" data-id="' . $row->id . '" title="Xóa">
                        <i class="fas fa-trash"></i>
                    </button>';
                })
                ->rawColumns(['checkbox', 'name', 'actions'])
                ->make(true);
        }

        return view('backend.categories.index');
    }

    public function create()
    {
        $page = 'Danh mục';
        $title = 'Thêm danh mục';

        return view('backend.categories.create', compact('title', 'page'));
    }

    public function edit($id)
    {
        $page = 'Danh mục';
        $title = 'Sửa danh mục';
        $category = Category::find($id);
        return view('backend.categories.create', compact('category', 'title', 'page'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|string|unique:categories,name',
            'description' => 'nullable|max:255|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'title_seo' => 'nullable|max:255|string',
            'description_seo' => 'nullable|string',
            'keyword_seo' => 'nullable|max:255|string',
            'description_short' => 'nullable|string',
        ]);

        $logoPath = $request->hasFile('logo')
            ? uploadImages('logo', 'category_images')
            : null;

        // dd($request->all());

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'logo' => $logoPath,
            'title_seo' => $request->title_seo,
            'description_seo' => $request->description_seo,
            'keyword_seo' => $request->keyword_seo,
            'description_short' => $request->description_short,
        ]);

        return redirect()->route('admin.category.index')->with('success', 'Thêm mới thành công');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255|string|unique:categories,name,' . $id,
            'description' => 'nullable|string|max:255',
            'description_short' => 'nullable|string',
            'title_seo' => 'nullable|max:255|string',
            'description_seo' => 'nullable|string',
            'keyword_seo' => 'nullable|max:255|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $category = Category::findOrFail($id);

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->description = $request->description;
        $category->description_short = $request->description_short;
        $category->title_seo = $request->title_seo;
        $category->description_seo = $request->description_seo;
        $category->keyword_seo = $request->keyword_seo;

        // Nếu có upload logo mới
        if ($request->hasFile('logo')) {
            // Xóa ảnh cũ nếu có
            if ($category->logo && Storage::disk('public')->exists($category->logo)) {
                Storage::disk('public')->delete($category->logo);
            }

            // Upload ảnh mới
            $logoPath = uploadImages('logo', 'category_images', true, false);
            $category->logo = $logoPath;
        }

        $category->save();

        return redirect()->route('admin.category.index')->with('success', 'Cập nhật thành công');
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);

        if ($category->logo && Storage::disk('public')->exists($category->logo)) {
            Storage::disk('public')->delete($category->logo);
        }

        $category->delete();

        return response()->json(['success' => true, 'message' => 'Xóa danh mục thành công.']);
    }

}