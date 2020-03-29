<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ Session::token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">   
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <title>{{ config('app.name', 'taskjob') }}</title>
    </head>
    <body>
       @include('inc.navbar')
       <div class="container mt-5 mb-5">
        @include('inc.messages')    
       @yield('content')
       </div>
    </body>
</html>
