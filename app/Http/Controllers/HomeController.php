<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id)->post_models()->orderBy('created_at', 'desc')->paginate(2);
        //return view('home')->with('posts', $user->post_models); //since it has a relationship with the post_models
        return view('home')->with('posts', $user);
    }
}
