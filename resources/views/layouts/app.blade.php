<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" >
        <!--font-->
        <link href="https://fonts.googleapis.com/css?family=Raleway:500" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 500;
                height: 100vh;
                margin: 0;
            }
        </style>
        
        <title>{{ config('app.name') }}</title>
    </head>
    <body>
        @yield('content')
    </body>
</html>
