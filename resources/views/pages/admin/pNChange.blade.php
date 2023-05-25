@extends('layouts.master')

@section('title', 'Phone Number Change')

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
    <!-- Change phone number form -->
    <form method="POST" id="editpn" class="editpn">
            <legend>Phone Number Change</legend>
            {{ csrf_field() }}
            <div class="formGroup">
            <p>Present Phone Number</p><input type="text" name="editPNP" id="editPNP" placeholder="Enter present phone number">
            @error('editPN')
                <span style="color:red">{{$message}}</span>
            @enderror
            <p>New Phone Number</p><input type="text" id="newPN" name="newPN" placeholder="Enter new phone number">
            @error('newPN')
                <span style="color:red">{{$message}}</span>
            @enderror
            </div>
            <button type="submit" class ="btn btn-primarry">Change</button>
    </form>
@stop