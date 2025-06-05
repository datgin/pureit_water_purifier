<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Keyword;
use App\Models\News;
use App\Models\SeoScoreNews;
use App\RankmathSEOForLaravel\Services\SeoAnalyzer;
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
                    return !empty($row->posted_at) ? $row->posted_at->format('d/m/Y') : 'N/A';
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


    public function create(Request $request)
    {
        $isEdit = false;
        $page = 'Bài viết';
        $title = 'Thêm Bài viết';
        $new = null;
        $keywords = Keyword::pluck('name')->toArray();
        $categories = Category::where('type', 'blog')->get();
        $seoData = $this->getSeoAnalysis($request);


        return view('backend.news.form', compact('title', 'page', 'new', 'keywords', 'isEdit', 'categories', 'seoData'));
    }

    public function edit(Request $request, $id)
    {
        $isEdit = true;
        $page = 'Bài viết';
        $title = 'Sửa Bài viết';
        $new = News::find($id);
        $keywords = Keyword::pluck('name')->toArray();
        $categories = Category::where('type', 'blog')->get();
        $seoData = $this->getSeoAnalysis($request);

        // dd($new);

        return view('backend.news.form', compact('new', 'title', 'page', 'keywords', 'isEdit', 'categories', 'seoData'));
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'category_id' => 'required|integer|exists:categories,id',
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:news,slug',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
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
                $keywords = explode(',', $credentials['seo_keywords']);
                $keywords = array_map('trim', $keywords);
                $credentials['seo_keywords'] = $keywords;

                $focusKeyword = $keywords[0] ?? '';
            } else {
                $focusKeyword = '';
            }

            $analyzer = app(SeoAnalyzer::class);
            $analysisResult = $analyzer->analyze(
                $credentials['seo_title'],
                $credentials['content'],
                $focusKeyword,
                $credentials['seo_description'] ?? '',
                $credentials['slug']
            );

            $analysis = collect($analysisResult->checks ?? []);
            $suggestions = collect($analysisResult->suggestions ?? []);
            $seoScoreValue = $this->calculateSeoScore($analysis, $suggestions);

            $new = News::create($credentials);

            // Lưu điểm SEO
            $this->saveSEOScore($new, $seoScoreValue);
            session()->flash('success', 'Thêm bài viết thành công!');

        } catch (\Exception $e) {
            Log::error('News store error: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
            return response()->json([
                'success' => false,
                'message' => 'Đã có lỗi xảy ra, vui lòng thử lại sau!',
                'error' => $e->getMessage(),
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
            $seoData = $this->getSeoAnalysis(new Request(), $news->id);
            $seoScoreValue = $seoData['seoScoreValue'];
            $this->saveSEOScore($news, $seoScoreValue);

            session()->flash('success', 'Thay đổi bài viết thành công!');
            return response()->json([
                'success' => true

            ], 201);

        } catch (\Exception $e) {
            return back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }

    // Tính điểm
    private function calculateSeoScore($analysis, $suggestions) 
    {
        $allItems = collect($analysis)->merge($suggestions);

        $totalCriteria = $allItems->count();

        $successCount = $allItems->where('status', 'success')->count();
        $warningCount = $allItems->where('status', 'warning')->count();
        $failCount = $allItems->where('status', 'danger')->count();

        if ($totalCriteria === 0) {
            return 0;
        }

        $score = ($successCount * 1 + $warningCount * 0.5 + $failCount * 0) / $totalCriteria * 100;

        return round($score);
    }

    // Lưu điểm SEO
    public function saveSEOScore(News $news, $seoScoreValue)
    {
        SeoScoreNews::updateOrCreate(
            ['new_id' => $news->id],
            ['seo_score' => $seoScoreValue]
        );
    }

    public function getSeoAnalysis(Request $request, $id = null)
    {
        if (!$id) {
            return [
                'new' => null,
                'seoScore' => null,
                'keywords' => [],
                'analysis' => [],
                'suggestions' => [],
                'hasWarning' => false,
                'seoScoreValue' => 0,
            ];
        }

        $new = News::findOrFail($id);

        $seoKeywords = $request->input('seo_keywords', []);
        $focusKeyword = is_array($seoKeywords) ? ($seoKeywords[0] ?? '') : $seoKeywords;

        $analyzer = app(SeoAnalyzer::class);
        // dd($new->seo_title, $new->content, $focusKeyword, $new->seo_description ?? '', $new->slug);

        $analysisResult = $analyzer->analyze($new->seo_title = '', $new->content, $focusKeyword, $blog->seo_description ?? '', $blog->slug);

        $analysis = collect($analysisResult->checks)->map(function ($item) {
            $status = $item['status'] ?? ($item['passed'] ? 'success' : 'warning');
            return array_merge($item, ['status' => $status]);
        })->toArray();

        $suggestions = collect($analysisResult->suggestions ?? [])->map(function ($item) {
            $status = $item['status'] ?? ($item['passed'] ? 'success' : 'info');
            return array_merge($item, ['status' => $status]);
        })->toArray();


        $seoScoreValue = $this->calculateSeoScore($analysis, $suggestions);
        $hasWarning = $seoScoreValue < 80 || collect($analysis)->contains(fn($item) => $item['passed'] === false);

        $seoScore = SeoScoreNews::where('new_id', $new->id)->first();

        return [
            'new' => $new,
            'seoScore' => $seoScore,
            'keywords' => $new->keywords,
            'analysis' => $analysis,
            'suggestions' => $suggestions,
            'hasWarning' => $hasWarning,
            'seoScoreValue' => $seoScoreValue,
        ];
    }

    public function getSeoAnalysisLive(Request $request)
    {
        $seoTitle = $request->seo_title ?? '';
        $content = $request->content ?? '';
        $slug = $request->slug ?? '';
        $seoDescription = $request->seo_description ?? '';
        $seoKeywords = $request->input('seo_keywords', []);
        $focusKeyword = is_array($seoKeywords) ? ($seoKeywords[0] ?? '') : $seoKeywords;
        $short_description = $request->short_description ?? '';

        $analyzer = app(SeoAnalyzer::class);

        $analysisResult = $analyzer->analyze($seoTitle, $content, $focusKeyword, $seoDescription, $slug);
        $analysis = collect($analysisResult->checks)->map(function ($item) {
            $status = $item['status'] ?? ($item['passed'] ? 'success' : 'warning');
            return array_merge($item, ['status' => $status]);
        })->toArray();

        $suggestions = collect($analysisResult->suggestions ?? [])->map(function ($item) {
            $status = $item['status'] ?? ($item['passed'] ? 'success' : 'info');
            return array_merge($item, ['status' => $status]);
        })->toArray();

        $seoScoreValue = $this->calculateSeoScore($analysis, $suggestions);
        $hasWarning = $seoScoreValue < 80 || collect($analysis)->contains(fn($item) => $item['passed'] === false);

        $seoData = [
            'analysis' => $analysis,
            'suggestions' => $suggestions,
            'seoScoreValue' => $seoScoreValue,
            'hasWarning' => $hasWarning,
        ];

        $seoScoreValue = $seoData['seoScoreValue'] ?? 0;
        $seoColor = 'bg-danger'; // đỏ mặc định (dưới 50)
        $badgeClass = 'bg-danger';

        if ($seoScoreValue >= 80) {
            $seoColor = 'bg-success'; // xanh lá (tốt)
            $badgeClass = 'bg-success';
        } elseif ($seoScoreValue >= 50) {
            $seoColor = 'bg-warning'; // vàng (trung bình)
            $badgeClass = 'bg-warning text-dark';
        }

        // dd(vars: $seoData);

        $view = view('backend.news.seo', compact('seoData'))->render();
        return response()->json([
            'success' => true,
            'html' => $view,
            'seoScoreVal' => $seoScoreValue,
            'seoColor' => $seoColor,
            'badgeClass' => $badgeClass
        ]);
    }

}
