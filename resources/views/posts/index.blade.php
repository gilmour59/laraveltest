@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    <div class="container-fluid">
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="card card-block bg-faded p-2 my-3 bg-light">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <img class="img-thumbnail" src="/storage/images/{{$post->image_name}}" width="150" height="150" alt="Image">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3> <a href="/post/{{ $post->id }}"> {{$post->name}} </a> </h3>
                        <small>{{$post->body}}</small>
                        <small>Written on: {{$post->created_at}} by {{$post->user->name}} <!--Post belongsTo User --></small>
                    </div>
                </div>
            </div>
        @endforeach
            {{ $posts->links() }}
    @else
        <p>No Post found</p>
    @endif
    </div>
@endsection