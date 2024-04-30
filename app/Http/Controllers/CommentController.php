<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use http\QueryString;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $comment = new Comment();
        $comment->text = $request['text'];
        $comment->user_id = $request->user()['id'];
        $comment->news_id = $request->route('news');
        $comment->save();

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        return view('edit-comment', ['comment' => $comment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'text' => ['required', 'string'],
        ]);

        // Оновлення даних новини
        $comment->update([
            'text' => $request->text,
        ]);

        return redirect()->route('crud-comment');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('crud-comment');
    }
}
