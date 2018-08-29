@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                        <a href="/post/create" class="btn btn-primary float-right mb-2">Create Post</a>
                    </div>

                    <h3>Your Posts</h3>
                    @if (count($posts) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th style="width:40%;">Title</th>
                                <th style="width:40%;">Created At</th>
                                <th style="width:10%;"></th>
                                <th style="width:10%;"></th>
                            </tr>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{$post->name}}</td>
                                    <td>{{$post->created_at}}</td>
                                    <td><a href="/post/{{$post->id}}/edit" class="btn btn-primary float-right">Edit</a></td>
                                    <td>
                                        <form action="{{action('PostsController@destroy', $post->id)}}" method="post" class="float-right">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <input type="submit" class="btn btn-danger" value="Delete">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {{ $posts->links() }}
                    @else
                        <h5>You Have No Posts!</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
