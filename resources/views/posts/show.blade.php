@extends('layouts.app')

@section('content')
    <a class="d-block mb-3" href="/post"><-- Go Back</a>

    <h1>{{ $post['name'] }}</h1> <!--[] or -> can be used-->

    <div class="container-fluid">
        <h3>{{ $post->body }}</h3>
        <img class="img-thumbnail" src="/storage/images/{{$post->image_name}}" width="250" height="250" alt="Image">
        <hr>
    </div>
    @if (!Auth::guest())
        @if (Auth::user()->id == $post->user_id)
            <div>
                <a href="/post/{{$post->id}}/edit" class="btn btn-primary float-left mr-2">Edit</a>
                <form action="{{action('PostsController@destroy', $post->id)}}" method="post" class="float-left">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </form>
            <div>             
        @endif    
    @endif
@endsection