<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;

class NewsController extends Controller
{
    public function news()
    {
        $blogCategories = Category::where('type', 'blog')->where('status', 1)->get();
        $news = News::where('status', 1)->get();

        return view('frontend.pages.news', compact('news', 'blogCategories'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)
            ->where('type', 'blog')
            ->firstOrFail();

        $blogCategories = Category::where('type', 'blog')->where('status', 1)->get();

        $news = News::where('category_id', $category->id)
            ->where('status', 1)
            ->get();

        return view('frontend.pages.news', compact('news', 'category', 'blogCategories'));
    }

    public function detail($slug)
    {
        
        $news = News::where('slug', $slug)->firstOrFail();
        dd($news);

        $relatedNews = News::where('category_id', $news->category_id)
            ->where('id', '!=', $news->id)  
            ->where('status', 1)
            ->get();
        return view('frontend.pages.detail_news', compact('news', 'relatedNews'));
    }

}