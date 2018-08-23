<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostModel;
use DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = PostModel::all(); 
        /* ^^this is an Object gettype returns an object; 
        it may look like an array but it is not */

        //$posts = DB::select('SELECT * FROM post_models');
        //$posts = PostModel::where('name', 'name one')->get();
        //$posts = PostModel::orderBy('created_at', 'desc')->get();

        $posts = PostModel::orderBy('created_at', 'desc')->paginate(2);
        return view('posts.index')->with('posts', $posts); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'body' => 'required'
        ]);

        //Create Post 
        $post = new PostModel();
        $post->name = $request->input('name');
        $post->body = $request->input('body');
        $post->save();

        //Redirecting With Flashed Session Data
        return redirect('/post')->with('success', 'Post Added!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = PostModel::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = PostModel::find($id);
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'body' => 'required'
        ]);

        //Create Post 
        $post = PostModel::find($id);
        $post->name = $request->input('name');
        $post->body = $request->input('body');
        $post->save();

        //Redirecting With Flashed Session Data
        return redirect('/post')->with('success', 'Post Saved!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = PostModel::find($id);
        $post->delete();

        return redirect('/post')->with('success', 'Post Deleted');
    }
}
