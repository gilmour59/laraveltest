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
                    <a href="/post/create" class="btn btn-primary">Create Post</a>
                    <h3>Your Posts</h3>

                    @if (count($posts) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th class="col-8">Title</th>
                                <th class="col-2"></th>
                                <th class="col-2"></th>
                            </tr>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{$post->name}}</td>
                                    <td><a href="/post/{{$post->id}}/edit" class="btn btn-primary">Edit</a></td>
                                    <td>
                                        <form action="{{action('PostsController@destroy', $post->id)}}" method="post" class="float-left">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <input type="submit" class="btn btn-danger" value="Delete">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <h5>You Have No Posts!</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
