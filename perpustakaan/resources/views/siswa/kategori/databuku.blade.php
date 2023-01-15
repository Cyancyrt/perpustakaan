@extends('layout.second')

@section('container')
<h1>Kategori : {{ $title }} </h1>
@if (request('kategori'))
<input type="hidden" name="kategori" value="{{ request('kategori') }}">
@endif
<div class="container">
    <div class="row">
        @foreach ($databuku as $buku)
        <div class="col-md-4">
            <div class="card" style="width: 20rem; height: 20rem;">
                <img src="{{ url('public/Image/'.$buku->image) }}" style="height: 100px; width: 46,5vw;" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">JUDUL: {{ $buku->title }} </h5>
                    <p class="card-text">ID BUKU: {{ $buku->bookid }} </p>
                    <p class="card-text">available book: {{ $buku->qty }} </p>
                    <p class="card-text"> Kategori:
                        {{ $buku->kategori->name }} </a>
                    </p>
                    @if($buku->qty > 0)
                    <form action="{{ route('pinjam', $buku->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-danger">pinjam</button>
                    </form>
                    @elseif($buku->qty == 0)
                    <button class="btn btn-danger" disabled>Not available</button>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div>
    <a href="{{ route('siswa.index') }}">back</a>
</div>
@endsection
