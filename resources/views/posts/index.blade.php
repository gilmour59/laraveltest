@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    <div class="container-fluid">
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="card card-block bg-faded p-2 my-3 bg-light">
                <h3> <a href="/post/{{ $post->id }}"> {{$post->name}} </a> </h3>
                <small>{{$post->body}}</small>
                <small>Written on: {{$post->created_at}} by {{$post->user->name}}</small> <!--Post belongsTo User -->
            </div>
        @endforeach
            {{ $posts->links() }}
    @else
        <p>No Post found</p>
    @endif
    </div>
@endsection