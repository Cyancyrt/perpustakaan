@extends('layout.main')

@section('container')

<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Create New Siswa</h2>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Input gagal.<br><br>
        @foreach ($errors->all() as $error)
        <br>{{ $error }}<br>
        @endforeach
    </div>
    @endif
    <form action="{{ route('datasiswa.store') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <!-- {{ method_field('PUT') }} -->
        <div class="row d-flex justify-content-center">
            <div class="form-group">
                <strong>NIS:</strong>
                <input type="text" name="nisn" class="form-control" placeholder="NIS SISWA">
            </div>
            <br>
            <div class="form-group">
                <strong>Nama Siswa:</strong>
                <input type="text" name="name" class="form-control" placeholder="NAMA SISWA">
            </div>
            <br>
            <div class="form-group">
                <strong>email: </strong>
                <input type="email" name="email" class="form-control" placeholder="password">
            </div>
            <br>
            <div class="form-group">
                <strong>username: </strong>
                <input type="text" name="username" class="form-control" placeholder="password">
            </div>
            <br>
            <div class="form-group">
                <strong>Password:</strong>
                <input type="password" name="password" class="form-control" placeholder="password">
            </div>
            <br>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <a href="{{ route('datasiswa.datasiswa') }}"> back </a>
            </div>
        </div>

    </form>

    @endsection
