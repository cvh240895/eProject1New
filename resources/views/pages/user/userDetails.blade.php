@extends('layouts.master')

@section('title', 'User Information')

@section('style-libraries')
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
@stop

@section('content')
    <table>
        <thead>
            <tr>
                <th></th>
                <th>Information</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Full Name</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Account</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>***********</td>
                <td><button onclick="Change_pwd()">Change</button></td>
            </tr>
            <tr>
                <td>Email</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Phone Number</td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
@stop

@section('scripts')
    <script type="text/javascript">
        function Change_pwd(){
            window.location.href = "pwdChange";
        }
    </script>
@stop