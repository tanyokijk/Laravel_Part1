<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('addCategory');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request['name'];
        $category->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {

            return view('edit-category', ['category' => $category]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => ['required', 'string'],
        ]);

        // Оновлення даних новини
        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('crud-category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('crud-category');
    }
}
