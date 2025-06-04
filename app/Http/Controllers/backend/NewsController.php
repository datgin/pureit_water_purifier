<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Keyword;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class NewsController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->ajax()) {

            return DataTables::of(News::query()->with('category'))
                ->addColumn('checkbox', function ($row) {
                    return '<input type="checkbox" class="select-item" value="' . $row->id . '">';
                })
                ->addColumn('category', function ($row) {
                    return !empty($row->category) ? $row->category->name : 'N/A';
                })
                ->editColumn('image', function ($row) {
                    return '<img src="' . $row->image . '" width="50"/>';
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format('d/m/Y');
                })
                ->editColumn('posted_at', function ($row) {
                    return  !empty($row->posted_at) ?$row->posted_at->format('d/m/Y') : 'N/A';
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
                    <a href="' . route('admin.news.edit', $row->id) . '" class="btn btn-sm btn-primary" title="Sửa">
                        <i class="fas fa-edit"></i>
                    </a>
                    <button class="btn btn-sm btn-danger btn-delete" data-id="' . $row->id . '" title="Xóa">
                        <i class="fas fa-trash"></i>
                    </button>';
                })
                ->rawColumns(['checkbox', 'actions', 'status', 'image'])
                ->addIndexColumn()
                ->make(true);

        }

        return view('backend.news.index');
    }


    public function create()
    {
        $isEdit = false;
        $page = 'Bài viết';
        $title = 'Thêm Bài viết';
        $new =null;
        $keywords = Keyword::pluck('name')->toArray();
        $categories = Category::where('type', 'blog')->get();

        return view('backend.news.form', compact('title', 'page', 'new', 'keywords', 'isEdit', 'categories'));
    }

    public function edit($id)
    {
        $isEdit = true;
        $page = 'Bài viết';
        $title = 'Sửa Bài viết';
        $new = News::find($id);
        $keywords = Keyword::pluck('name')->toArray();
        $categories = Category::where('type', 'blog')->get();
        // dd($new);

        return view('backend.news.form', compact('new', 'title', 'page', 'keywords', 'isEdit', 'categories'));
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'category_id' => 'required|integer|exists:categories,id',
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:news,slug',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'short_description' => 'nullable|string|max:255',
            'content' => 'required|string',
            'posted_at' => 'nullable|date',
            'remove_at' => 'nullable|date|after_or_equal:posted_at',
            'view_count' => 'nullable|numeric',
            'status' => 'required|boolean',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string',
            'seo_keywords' => 'nullable|string|max:255',
        ]);

        // dd($request->all());

        try {

            // Tạo slug nếu không có
            if (empty($credentials['slug'])) {
                $credentials['slug'] = Str::slug($credentials['title']);
            }

            // Lưu hình ảnh nếu có
            if ($request->hasFile('image')) {
                $credentials['image'] = saveImage($request, 'image', 'news_image');
            }

            // Gán mặc định cho view_count nếu rỗng
            if (empty($credentials['view_count'])) {
                $credentials['view_count'] = 0;
            }

            if (!empty($credentials['seo_keywords'])) {
                $credentials['seo_keywords'] = explode(',', $credentials['seo_keywords']);
            }

            News::create($credentials);
            session()->flash('success', 'Thêm bài viết thành công!');

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Đã có lỗi xảy ra, vui lòng thử lại sau!'
            ], 400);
        }
    }

    public function update(Request $request, $id)
    {
        $credentials = $request->validate([
            'category_id' => 'required|integer|exists:categories,id',
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:news,slug,' . $id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'short_description' => 'nullable|string|max:255',
            'content' => 'required|string',
            'posted_at' => 'nullable|date',
            'remove_at' => 'nullable|date|after_or_equal:posted_at',
            'view_count' => 'nullable|numeric',
            'status' => 'required|boolean',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string',
            'seo_keywords' => 'nullable|string|max:255',

        ]);

        try {
            $news = News::findOrFail($id);

            // Tạo slug nếu không có
            if (empty($credentials['slug'])) {
                $credentials['slug'] = Str::slug($credentials['title']);
            }

            // Gán mặc định cho view_count nếu rỗng
            if (empty($credentials['view_count'])) {
                $credentials['view_count'] = 0;
            }

            // Xử lý ảnh
            if ($request->hasFile('image')) {
                // Xóa ảnh cũ nếu có
                if ($news->image && Storage::exists('public/' . $news->image)) {
                    Storage::delete('public/' . $news->image);
                }

                $credentials['image'] = saveImage($request, 'image', 'news_image');
            }

            if (!empty($credentials['seo_keywords'])) {
                $credentials['seo_keywords'] = explode(',', $credentials['seo_keywords']);
            }
            // dd($credentials);

            $news->update($credentials);
            session()->flash('success', 'Thay đổi bài viết thành công!');
            return response()->json([
                'success' => true
               
            ], 201);

        } catch (\Exception $e) {
            return back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }

}
