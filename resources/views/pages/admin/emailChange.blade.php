@extends('layouts.master')

@section('title', 'Email Change')

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
    <!-- Change email form -->
    <form method="POST" id="editemail" class="editemail">
            <legend>Email Change</legend>
            {{ csrf_field() }}
            <div class="formGroup">
            <p>Present Phone Number</p><input type="text" name="editPNE" id="editPNE" placeholder="Enter present phone number">
            @error('editPNE')
                <span style="color:red">{{$message}}</span>
            @enderror
            <p>New Email</p><input type="text" id="newEmail" name="newEmail" placeholder="Enter new email">
            @error('newEmail')
                <span style="color:red">{{$message}}</span>
            @enderror
            </div>
            <button type="submit" class ="btn btn-primarry">Change</button>
    </form>
@stop