<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{ asset('/img/smk8.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakan Login</title>
</head>

<body>

    <img class="wave" src="{{ asset('/img/wave.png') }}">
    <div class="container">
        <div class="img">
            <img src="{{ asset('/img/bg.svg') }}">
        </div>
        <div class="login-content">
            <form action="{{ route('siswa.login') }}" method="POST">
                @csrf
                <img src="{{ asset('/img/smk8.png') }}">
                <h2 class="title">Welcome Student</h2>
                @error('nisn')
                <p style="color: red;">{{ $message }}</p>
                @enderror
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <input type="text" placeholder="NISN Murid" name="nisn" class="input" required>
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <input type="password" placeholder="Password" name="password" class="input" required>
                    </div>
                </div>
                <a href="{{ route('password.form') }}">Forgot Password?</a>
                <a href="{{ route('siswa.create') }}">Don't have an Account?</a>
                <input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="{{ URL::asset('/js/main.js') }}"></script>
</body>

</html>
