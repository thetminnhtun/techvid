<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Custom Styles -->
    
    <link rel="icon" href="{{asset('favicon.ico')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('bower_components/Croppie/croppie.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('bower_components/components-font-awesome/css/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{asset('css/trumbowyg.css')}}">


    @yield('css')
<body class="">

    <div id="app">
        @include('layouts.nav')

        <main class="py-2">
            @yield('content')
        </main>
    </div>

<script src="{{asset('bower_components/jquery/dist/jquery.js')}}"></script>
<script src="{{asset('bower_components/popper.js/dist/popper.js')}}"></script>

<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.js')}}"></script>
<script src="{{asset('bower_components/Croppie/croppie.js')}}"></script>
<script src="{{asset('js/trumbowyg.js')}}"></script>


@yield('script')
</body>
</html>
