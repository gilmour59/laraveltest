@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="card card-block bg-faded p-2 m-3 bg-light">
                <h3> <a href="/post/{{ $post->id }}"> {{$post->name}} </a> </h3>
                <small>{{$post->body}}</small>
                <small>Written on: {{$post->created_at}}</small>
            </div>
        @endforeach
            {{ $posts->links()}}
    @else
        <p>No Post found</p>
    @endif
@endsection