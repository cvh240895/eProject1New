@extends('layouts.master')

@section('title', 'Home Page')

@section('style-libraries')
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
@stop

@section('content')
    <div class="welcome">
        <!-- show the user name and uid after login success -->
        <p>Welcome</p><p></p>
        <p>Your UID</p><p></p>
    </div>
    <div class="hot_news">
        <!-- show the hot news -->
        <h3><a href=""><strong>HOT </strong>Promotion : 10 years Anniversary, lucky draw 10.000$</a></h3>
        <h3><a href=""><strong>Show(Event) </strong>Mermaid show : what is waiting for you</a></h3>
    </div>
@stop