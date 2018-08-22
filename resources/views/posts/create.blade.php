@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>
    
    <form method="POST" action="{{action('PostsController@store')}}">
        @csrf
        <div class="form-group">
            <label class="control-label" for="name">Name: </label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name.."/>
        </div>
        <div class="form-group">
            <label class="control-label" for="body">Body: </label>
            <textarea class="form-control" name="body" id="body" placeholder="Body.."></textarea>
        </div>
        <input type="submit" value="Submit" class="btn btn-primary"/>
    </form>
@endsection