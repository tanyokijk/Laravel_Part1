<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();

            $query = News::query();

            if(isset($request->summary) && $request->summary!=null)
            {
                $query->where('summary', 'LIKE', '%' . $request->summary . '%');
            }

            if(isset($request->category) && $request->category != null) {
                $categories_name = explode(',', $request->category);
                $categories_id=[];
                foreach ($categories_name as $category_name)
                {
                    $category = Category::where('name', $category_name)->first();
                    if ($category) {
                        $categories_id[] = $category->id;
                    }
                }
                $query->whereIn('category_id', $categories_id);
            }

            $news = $query->get();

            return view('news', ['email' => $user['email'], 'news' => $news, 'categories' => Category::all()]);
        } else {
            $query = News::query();

            if(isset($request->summary) && $request->summary!=null)
            {
                $query->where('summary', $request->summary);
            }

            if(isset($request->category) && $request->category!=null)
            {
                $query->whereHas('categoryName', function ($q) use ($request)
                {
                    $q->whereIn('id',$request->category);
                });
            }

            $news = $query->get();
            return view('news', ['news' => $news, 'categories' => Category::all()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addNew')->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $news = new News();
        $news->summary = $request['header'];
        $news->short_description = $request['short'];
        $news->full_text = $request['article'];
        $category = Category::where('name', $request['category'])->firstOrFail();
        $news->category_id = $category->id;
        $news->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $news = News::findOrFail($id);
        $isLoggedIn = Auth::check();
        return view('one-new', [
            'news' => $news,
            'category' => Category::where('id', $news['category_id'])->firstOrFail(),
            'isLoggedIn' => $isLoggedIn,
            'comments' => Comment::where('news_id', $id)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        //
    }
}
