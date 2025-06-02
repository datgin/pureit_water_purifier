<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/category/{slug}', [ProductController::class, 'category'])->name('category');

// Route chi tiết sản phẩm
Route::get('/product/{slug}', [ProductController::class, 'detail'])->name('detail');