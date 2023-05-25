@extends('layouts.master')

@section('title', 'Result')

@section('style-libraries')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@stop

@section('styles')
    {{--custom css item suggest search--}}
    <style>
        .autocomplete-group { padding: 2px 5px; }
        .hide{
            display : none;
        }
        .error{
            color : red;
        }
    </style>
@stop


@section('content')
        <div class="site_result">
        @csrf
            <span style ="color : green">{{$output1}}</span>
            <span style ="color : red">{{$output2}}</span>
            <span style ="color : red">{{$output3}}</span>
        </div>
@stop