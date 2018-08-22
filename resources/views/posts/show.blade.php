@extends('layouts.app')

@section('content')
    <a href="/post">Go Back</a>
    <h1>{{ $post['name'] }}</h1> <!--[] or -> can be used-->
        <h3>{{ $post->body }}</h3>
@endsection