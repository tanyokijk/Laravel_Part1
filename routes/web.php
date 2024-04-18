<?php

use App\Models\News;
use Illuminate\Support\Facades\Route;

Route::get('/news', function () {
    $email = session('email');
    return view('news', ['email' => $email, 'news' => News::all()]);
});

Route::get('/add-new', [\App\Http\Controllers\addNewController::class, 'index']);
Route::post('/add-new', [\App\Http\Controllers\addNewController::class, 'store']);

Route::get('/', [\App\Http\Controllers\LoginController::class, 'index']);
Route::post('/', [\App\Http\Controllers\LoginController::class, 'store']);
