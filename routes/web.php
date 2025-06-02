<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\NewsController;
use App\Http\Controllers\Frontend\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/category/{slug}', [ProductController::class, 'category'])->name('category');

// Route chi tiết sản phẩm
Route::get('/product/{slug}', [ProductController::class, 'detail'])->name('detail');

// Bài viết
Route::get('/news', [NewsController::class, 'news'])->name('news');
Route::get('/category/{slug}', [NewsController::class, 'category'])->name('category');
Route::get('/news/{slug}', [NewsController::class, 'detail'])->name('detail');

