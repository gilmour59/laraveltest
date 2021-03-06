@extends('layouts.app')

@section('content')
            <div class="content">
                <div class="title m-b-md">
                    {{$title . ' LOL ' . $test . ' array: ' . $arrayTest[1]}} 
                    <ul>
                        @if(count($arrayTest) > 0)
                            @foreach($arrayTest as $array)
                                <li>{{$array}}</li>
                            @endforeach
                        @endif
                    </ul>
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
@endsection
