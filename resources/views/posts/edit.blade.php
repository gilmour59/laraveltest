@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>
    <div class="container-fluid">
    <form method="POST" action="{{action('PostsController@update', $post->id)}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label class="control-label" for="name">Name: </label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name.." value="{{$post->name}}"/>
        </div>
        <div class="form-group">
            <label class="control-label" for="body">Body: </label>
            <textarea class="form-control" name="body" id="body" placeholder="Body..">{{$post->body}}</textarea>
        </div>
        <div class="form-group">
            <label class="control-label" for="image">Image: </label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="image" name="image">
                <label class="custom-file-label form-control-file" for="image">Choose file</label>
            </div>
        </div>
        <input type="hidden" name="_method" value="PUT" />
        <input type="submit" value="Submit" class="btn btn-primary"/>
    </form>
    </div>
    <script>
        $('.custom-file-input').on('change',function(){
        $(this).next('.form-control-file').addClass("selected").html($(this).val());
        })
    </script>
@endsection