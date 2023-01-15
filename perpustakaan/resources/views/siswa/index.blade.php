@extends('layout.second')

@section('container')
<h1>Halo <em> {{ auth()->user()->username }} </em> </h1>
<div class="container">
    <div class="row">
        @foreach ($databuku as $buku)
        <div class="col-md-4 sm-3 lg-4 ">
            <div class="card " id="table" style="width: 90%; margin-left:10px;">
                <img src=" {{ url('public/Image/'.$buku->image) }}" style="height: 200px; width: 46,5vw;" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">JUDUL: {{ $buku->title }} </h5>
                    <p class="card-text">ID BUKU: {{ $buku->bookid }} </p>
                    <p class="card-text">available book: {{ $buku->qty }} </p>
                    <p class="card-text"> Kategori:
                        <a href="{{ route('kategori.databuku', $databuku[0]->kategori->slug) }}">{{ $databuku[0]->kategori->name }} </a>
                    </p>
                    @if($buku->qty > 0)
                    <form action="{{ route('pinjam', $buku->id) }}" style="display:inline-block;" method="POST">
                        @csrf
                        <button class="btn btn-danger">pinjam</button>
                    </form>
                    @elseif($buku->qty == 0)
                    <button class="btn btn-danger" disabled>Not available</button>
                    @endif
                    <button type="button" id="detail" style="display:inline-block;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" data-judul="{{ $buku->title }}" data-idbuku="{{ $buku->bookid }}" data-sinopsis="{{ $buku->sinopsis }}" data-qty="{{ $buku->qty }}">
                        Detail
                    </button>
                </div>
            </div>
        </div>
        @include('partial.modal')
        @endforeach
    </div>
    <a href="{{ route('subs') }}">launch</a>


    <div class="mt-5">
        <form action="{{ route('siswa.logout') }}" method="POST">
            @csrf
            <input type="submit" value="Logout">
        </form>
    </div>
</div>
@endsection
