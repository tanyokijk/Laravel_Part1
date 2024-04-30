<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewController;
use App\Http\Controllers\ProfileController;
use App\Models\News;
use Illuminate\Support\Facades\Route;

Route::get('/', [NewController::class, 'index'])->name('news.index');

Route::get('/dashboard', [NewController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/crudNews', function (){ return view('crudNews');})->middleware(['auth', 'verified'])->name('crud');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/news/{news}', [NewController::class, 'show'])->name('news.show');
Route::get('/add-new', [NewController::class, 'create'])->name('add-new');
Route::post('/add-new', [NewController::class, 'store']); //адмінка

Route::get('/add-category', [CategoryController::class, 'index'])->name('add-category');
Route::post('/add-category', [CategoryController::class, 'store']);

Route::post('/news/{news}', [CommentController::class, 'store']);

Route::get('/category/{category}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/crudCategory', function (){ return view('crudCategory');})->middleware(['auth', 'verified'])->name('crud-category');

Route::middleware('auth')->group(function () {
    Route::get('/news/edit/{news}', [NewController::class, 'edit'])->name('news.edit')->can('update', 'news');
    Route::patch('/news/update/{news}', [NewController::class, 'update'])->name('news.update')->can('update', 'news');
    Route::delete('/news/destroy/{news}', [NewController::class, 'destroy'])->name('news.destroy')->can('delete', 'news');
});

Route::middleware('auth')->group(function () {
    Route::get('/category/edit/{category}', [CategoryController::class, 'edit'])
        ->name('category.edit')->can('update', 'category');
    Route::patch('/category/update/{category}', [CategoryController::class, 'update'])->name('category.update')->can('update', 'category')->can('update', 'category');
    Route::delete('/category/destroy/{category}', [CategoryController::class, 'destroy'])->name('category.destroy')->can('delete', 'category')->can('delete', 'category');
});

Route::get('/crudComment', function (){ return view('crudComment');})->middleware(['auth', 'verified'])->name('crud-comment');

Route::middleware('auth')->group(function () {
    Route::get('/comment/edit/{comment}', [CommentController::class, 'edit'])->name('comment.edit')->can('update', 'comment');
    Route::patch('/comment/update/{comment}', [CommentController::class, 'update'])->name('comment.update')->can('update', 'comment');
    Route::delete('/comment/destroy/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy')->can('delete', 'comment');
});


require __DIR__.'/auth.php';
