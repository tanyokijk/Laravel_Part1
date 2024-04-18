<?php

use App\Models\News;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('news')->with('news', News::all());
});
Route::get('/add-new', [\App\Http\Controllers\addNewController::class, 'index']);
Route::post('/add-new', [\App\Http\Controllers\addNewController::class, 'store']);
