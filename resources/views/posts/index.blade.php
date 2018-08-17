@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="card card-block bg-faded">
                <h3>{{$post->name}}</h3>
                <h3>{{$post->body}}</h3>
            </div>
        @endforeach
    @else
        <p>No Post found</p>
    @endif
@endsection