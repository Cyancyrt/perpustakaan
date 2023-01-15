<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>

<body>
    <center>
        <h1>Admin Login</h1>



        @error('uuid')
        <p style="color: red;">{{ $message }}</p>
        @enderror


        <form action="{{ route('admin.login') }}" method="POST">
            @csrf

            <input type="number" name="uuid" placeholder="Enter your Uuid...">
            <input type="password" name="password" placeholder="Enter your password...">

            <input type="submit" value="Submit">
        </form>
    </center>
</body>
