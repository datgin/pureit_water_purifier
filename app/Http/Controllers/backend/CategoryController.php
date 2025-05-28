<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('backend.categories.index', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|string|unique:categories,name',

        ]);

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)

        ]);

        return redirect()->route('admin.category.index')->with('success', 'Thêm mới thành công');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255|string|unique:categories,name,' . $id,
        ]);

        $category = Category::where('id', $id)->firstOrFail();

        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name'));

        $category->save();

        return back()->with('success', 'Cập nhật thành công');
    }

    public function softDelete($id)
    {
        $category = Category::find($id);
        $category->delete();
        session()->flash('success', 'Đã được chuyển vào thùng rác');

        return redirect()->route('admin.category.index');
    }

    public function trash()
    {
        $category = Category::onlyTrashed()->get();
        return view('backend.categories.trash', compact('category'));
    }

    public function restore($id)
    {
        $category = Category::onlyTrashed()->find($id);
        $category->restore();
        return back()->with('success', 'Đã được chuyển vào thùng rác');
    }
}