@extends('layout.main')


@section('container')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
            <h1>Hello </h1>
            <h5>
                <a href="{{ route('datasiswa.datasiswa') }}">Data siswa</a>
            </h5>
            <h5>
                <a href="{{ route('databuku.databuku') }}">Data Buku</a>
            </h5>
            <h5>
                <a href="{{ route('pinjaman') }}">pinjaman</a>
            </h5>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <input type="submit" value="Logout">
            </form>
        </div>
    </div>
</div>

@endsection
