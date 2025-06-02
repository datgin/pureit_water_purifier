<?php

use App\Http\Controllers\Frontend\EmailController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\NewsController;
use App\Http\Controllers\Frontend\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('send-email', [EmailController::class, 'submitAdvice'])->name('send.email');

// Route chi tiết sản phẩm

// Bài viết
Route::get('/news', [NewsController::class, 'news'])->name('news');
Route::get('/category/{slug}', [NewsController::class, 'category'])->name('category');
Route::get('/news/{slug}', [NewsController::class, 'detail'])->name('detail');
Route::get('{categoryPath}/{productPath?}', [ProductController::class, 'product'])->name('product');

