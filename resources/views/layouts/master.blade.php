<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--CSRF Token--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', '@Master Layout'))</title>
    {{--Styles css common--}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('style-libraries')
    {{--Styles custom--}}
    @yield('styles')
</head>
<body>
    <div class="fullsite">
        <div class="site_header">
            @include('partial.header')
        </div>
        <div class="site_body">
            <div class="site_sidebar">
                @include('partial.sidebar')
            </div>
            <div class="site_content">
                @yield('content')
            </div>
        </div>
        <div class="site_footer">
            @include('partial.footer')
        </div>
    </div>
    
    {{--Scripts js common--}}
    {{--Scripts link to file or js custom--}}
    @yield('scripts')
</body>
</html>