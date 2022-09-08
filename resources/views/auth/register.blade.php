<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <form action="/register" method="POST">
        @csrf
        <div>
            <label for="name">Fullname</label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="email">Email Address</label>
            <input type="email" name="email" id="email">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <label for="repassword">Confirm Password</label>
            <input type="password" name="repassword" id="repassword">
        </div>
        <button type="submit">Register</button>
    </form>
</body>
</html>