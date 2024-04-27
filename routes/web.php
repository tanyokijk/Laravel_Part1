<?php

use App\Http\Controllers\AddCategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewController;
use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Facades\Route;

Route::get('/', [NewController::class, 'index'])->name('news.index');
Route::get('/news/{id}', [NewController::class, 'show'])->name('news.show');
Route::get('/add-new', [NewController::class, 'create']);
Route::post('/add-new', [NewController::class, 'store']);

Route::get('/add-category', [AddCategoryController::class, 'index']);
Route::post('/add-category', [AddCategoryController::class, 'store']);

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'store']);

Route::post('/news/{id}', [CommentController::class, 'store']);


