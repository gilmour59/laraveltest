<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostModel;
use DB;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    
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
            'body' => 'required',
            'image' => 'image|nullable|max:1999|required'
        ]);

        //Handle File Upload
        if ($request->hasFile('image')) {
            //get File Name
            $fileNameWithExtension = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            //Extension of Image/File
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '_' . $extension;
            //Upload Image (Store to a folder)
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        //Create Post 
        $post = new PostModel();
        $post->name = $request->input('name');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->image_name = $fileNameToStore;
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

        //Check for correct User
        if(auth()->user()->id == $post->user_id){
            return view('posts.edit')->with('post', $post);
        }else{
            return redirect()->back()->with('error', 'Unauthorized!');
        }
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
            'body' => 'required',
            'image' => 'image|nullable|max:1999'
        ]);

        //Create Post 
        $post = PostModel::find($id);
        $post->name = $request->input('name');
        $post->body = $request->input('body');
        //Handle File Upload
        if ($request->hasFile('image')) {
            //get File Name
            $fileNameWithExtension = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            //Extension of Image/File
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '_' . $extension;
            //Upload Image (Store to a folder)
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);

            $post->image_name = $fileNameToStore;
        }
        $post->save();

        if(auth()->user()->id == $post->user_id){
            //Redirecting With Flashed Session Data
            return redirect('/home')->with('success', 'Post Saved!'); 
        }else{
            return redirect('/home')->with('error', 'Unauthorized!');
        }
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

        if(auth()->user()->id == $post->user_id){
            if($post->image_name != 'noimage.jpg'){
                //Delete the image
                Storage::delete('public/images/' . $post->image_name);
            }
            $post->delete();
            return redirect('/post')->with('success', 'Post Deleted');
        }else{
            return redirect('/post')->with('error', 'Unauthorized!');
        }
    }
}
