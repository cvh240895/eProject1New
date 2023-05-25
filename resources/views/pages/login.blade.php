<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
        <div class="site_login">
            <form method="POST">
            {{ csrf_field() }}
                <Legend>Login</Legend>
                <title>Username</title><input type="text" required name="userLog" placeholder="Enter the username">
                <title>Password</title><input type="password" required name="pwdLog" placeholder="Enter the password">
                <title>Remember me? : </title> <input name="remember" type="checkbox">
                @if(session('msg'))
                <div style="font-size:20px; font-weight:bolder; color: rgb(253, 5, 5); text-align:center">
                 {{ session('msg') }}
                </div>
                 @endif
                <button type="submit">Login</button>
            </form>
        </div>
</body>
</html>
        
