@extends('layout.main')

@section('container')
<h1>Kategori : {{ $title }} </h1>
@foreach($databuku as $buku)
<div class="container">
    @if (request('kategori'))
    <input type="hidden" name="kategori" value="{{ request('kategori') }}">
    @endif
    <div class="col-md-6">
        <div class="card" style="width: 20rem; height: 20rem;">
            <div class="border position-absolute bg-dark px-3 opacity-50 text-white" style="width: 50%; height: auto; font-size:50%">
                <a href="{{ route('kategori.databuku',$buku->kategori->slug) }} " class="text-white text-decoration-none">
                    <h5>{{ $buku->kategori->name }}</h5>
                </a>
            </div>
            <img src="{{ url('public/Image/'.$buku->image) }}" style="height: 150px; width: 320px;" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">JUDUL: {{ $buku->title }} </h5>
                <p class="card-text">ID BUKU: {{ $buku->bookid }} </p>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
