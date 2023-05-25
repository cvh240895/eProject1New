@extends('layouts.master')

@section('title', 'Home Page')

@section('style-libraries')
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
@stop

@section('content')
    <form method="POST" class="form-group">
        <legend>Change Password</legend>
        {{ csrf_field() }}
        <p>Present password</p> <input type="password" required name="prePass" placeholder="Enter the present password">
        @error('prePass')
            <span style="color:red">{{$messages}}</span>
        @enderror
        <p>New password</p> <input type="password" required name="password" placeholder="Enter the new password, min : 6 and max : 20 characters">
        @error('password')
            <span style="color:red">{{$messages}}</span>
        @enderror
        <p>Confirm new password</p> <input type="password" required name="password_confirmation" placeholder="Enter the confirmation password">
        <button type="submit">Change</button>
    </form>
@stop