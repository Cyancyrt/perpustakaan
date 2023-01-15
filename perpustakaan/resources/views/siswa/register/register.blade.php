<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registeration</title>
    <link rel="icon" href="{{ asset('/img/smk8.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/stylee.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="container">
        <div class="row py-5 align-items-center">
            <!-- For Demo Purpose -->
            <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
                <img src="{{ asset('/img/regist.svg') }}" alt="" class="img-fluid mb-4 pt-5">
                <h1>Create an Account</h1>
                <p class="font-italic text-muted mb-0">Create a minimal registeration page using Bootstrap 4 HTML form elements.</p>
                </p>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Input gagal.<br><br>
                @foreach ($errors->all() as $error)
                <br>{{ $error }}<br>
                @endforeach
            </div>
            @endif
            <div class="col-lg-6 ms-5">
                <form class="row gx-3 gy-2 align-items-center" action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-lg-6">
                        <label class="visually-hidden" for="specificSizeInputName">EMAIL</label>
                        <input id="specificSizeInputName" type="text" name="email" class="form-control" placeholder="EMAIL">
                    </div>
                    <div class="col-lg-6">
                        <label class="visually-hidden" for="specificSizeInputName">Nama Murid</label>
                        <input id="specificSizeInputName" type="text" name="name" class="form-control" placeholder="NAMA Murid">
                    </div>
                    <div class="col-sm-4">
                        <label class="visually-hidden" for="specificSizeInputName">NISN Murid</label>
                        <input id="specificSizeInputName" type="number" name="nisn" class="form-control" placeholder="NISN Murid">
                    </div>
                    <div class="col-sm-4">
                        <label class="visually-hidden" for="specificSizeInputName">Password</label>
                        <input id="specificSizeInputName" type="password" name="password" class="form-control" placeholder="PASSWORD">
                    </div>
                    <div class="col-sm-4">
                        <label class="visually-hidden" for="specificSizeInputGroupUsername">Username</label>
                        <div class="input-group">
                            <div class="input-group-text bg-white border-end-0">@</div>
                            <input type="text" class="form-control border-start-0" name="username" id="specificSizeInputGroupUsername" placeholder="Username">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="autoSizingCheck2">
                            <label class="form-check-label" for="autoSizingCheck2">
                                Remember me
                            </label>
                        </div>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn" style="background-image: linear-gradient(to right, #32be8f, #38d39f, #32be8f); color:aliceblue;">Submit</button>
                    </div>
                </form>
                <div class="d-flex justify-content-end mt-5 pt-5">
                    <a href="{{ route('siswa.login') }}" class="btn" style="background-image: linear-gradient(to right, #32be8f, #38d39f, #32be8f); color:aliceblue;"> back </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Registeration Form -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ URL::asset('/js/main.js') }}"></script>
</body>

</html>
