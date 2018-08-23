@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>
    <div class="container-fluid">
    <form method="POST" action="{{action('PostsController@update', $post->id)}}">
        @csrf
        <div class="form-group">
            <label class="control-label" for="name">Name: </label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name.." value="{{$post->name}}"/>
        </div>
        <div class="form-group">
            <label class="control-label" for="body">Body: </label>
            <textarea class="form-control" name="body" id="body" placeholder="Body..">{{$post->body}}</textarea>
        </div>
        <input type="hidden" name="_method" value="PUT" />
        <input type="submit" value="Submit" class="btn btn-primary"/>
    </form>
    </div>
@endsection