@extends('layouts.master')

@section('title', 'Password Change')

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
    <!-- Change password form -->   
    <form method="POST" id="editpwd" class="editpwd">
            <legend>Password Change</legend>
            {{ csrf_field() }}
            <div class="formGroup">
            <p>New password</p><input type="password" name="password" id="newPass" placeholder="Enter new password">
            @error('password')
                <span style="color:red">{{$message}}</span>
            @enderror
            <p>Re-enter password</p><input type="password" id="reNewPass" name="password_confirmation" placeholder="Re-enter new password">
            <p>Present Phone Number</p><input type="text" name="prePN" required placeholder="Present Phone Number">
            @error('prePN')
                <span style="color:red">{{$message}}</span>
            @enderror
            </div>
            <button type="submit" class ="btn btn-primarry">Change</button>
    </form>
@stop