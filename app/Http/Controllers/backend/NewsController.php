<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\Category;
use App\Models\Keyword;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class NewsController extends Controller
{
    //
    public function index()
    {
        // Lấy tất cả bài viết (có thể thêm paginate nếu cần)
        $news = News::all();
        // Trả về view kèm dữ liệu
        return view('backend.news.index', compact('news'));
    }


    public function create()
    {
        $isEdit = false;
        $page = 'Bài viết';
        $title = 'Thêm Bài viết';
        $new = new News();
        $new->keyword_ids = [];
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
            'seo_keyword' => 'nullable|string|max:255',
        ]);

        try {
            // dd(vars: $request->all());

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

            News::create($credentials);

            return redirect()->route('admin.news.index')->with('success', 'Bài viết đã được thêm thành công');
        } catch (\Exception $e) {
            return back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
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
            'seo_keyword' => 'nullable|string|max:255',
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

            $news->update($credentials);

            return redirect()->route('admin.news.index')->with('success', 'Cập nhật bài viết thành công');
        } catch (\Exception $e) {
            return back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $new = News::findOrFail($id);

            // Xóa ảnh nếu tồn tại
            if ($new->image && file_exists(public_path('storage/' . $new->image))) {
                unlink(public_path('storage/' . $new->image));
            }

            $new->delete();
            return response()->json([
                'success' => true,
                'message' => 'Xóa sản phẩm thành công!'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra: ',
            ], 500);
        }

    }


}
