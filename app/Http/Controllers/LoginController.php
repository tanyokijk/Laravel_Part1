<?php

namespace App\Http\Controllers;

use App\Mail\LogIn;
use App\Models\News;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //Mail::to('t.derevyanko1209@gmail.com')->send(new LogIn());
        return view('loginView');
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
        if ($request->has('takeEmail'))
        {
            $user = new User();
            $user->email = $request['email'];
            $user->code = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
            $user->save();
            Mail::to($user->email)->send(new LogIn($user->code));
            $request->session()->put('user', $user);
            return view('loginView')->with('email', $request['email']);
        }
        elseif ($request->has('takeCode'))
        {
            $user = $request->session()->get('user');
            if($user->code==$request['code'])
            {
                session(['email' => $user->email]);
                return redirect('news')->with('email', $user->email);
            }
            else
            {
                return view('loginView')->with('message', "Неправильний код!");
            }
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
