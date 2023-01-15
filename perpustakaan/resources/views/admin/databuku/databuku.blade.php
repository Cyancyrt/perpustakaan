@extends('layout.main')

@section('container')
<div class="container">
    <div class="row">
        <div class="form-group">
            <h2>Data Buku</h2>
        </div>
        <div class="col-md-2">
            @if (request('kategori'))
            <input type="hidden" name="kategori" value="{{ request('kategori') }}">
            @endif
            <form action="{{ route('databuku.create') }}" style="text-align:left ;">
                <button type="submit" class="btn btn-sm btn-danger shadow">create</button>
            </form>
        </div>
    </div>
    @if($databuku->count())
    <div class="row mt-4">
        <div class="col-12">
            <div class="d-flex justify-content-center">
                <div class="card" style="width: 20rem;">
                    <img src="{{ url('public/Image/'.$databuku[0]->image) }}" style="height: 100px; width: 46,5vw;" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">JUDUL: {{ $databuku[0]->title }} </h5>
                        <p class="card-text">ID BUKU: {{ $databuku[0]->bookid }} </p>
                        <p class="card-text"> Kategori:
                            <a href="{{ route('kategori.databuku', $databuku[0]->kategori->slug) }}">{{ $databuku[0]->kategori->name }} </a>
                        </p>
                        <form action="{{ route('databuku.edit', $databuku[0]->id) }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-primary shadow">edit</button>
                        </form>
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('databuku.destroy', $databuku[0]->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger shadow">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        @foreach ($databuku->skip(1) as $buku)
        <div class="col-md-4">
            <div class="card" style="width: 20rem; height: 20rem;">
                <img src="{{ url('public/Image/'.$buku->image) }}" style="height: 100px; width: 46,5vw;" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">JUDUL: {{ $buku->title }} </h5>
                    <p class="card-text">ID BUKU: {{ $buku->bookid }} </p>
                    <p class="card-text"> Kategori:
                        <a href="{{ route('kategori.databuku', $databuku[0]->kategori->slug) }}">{{ $databuku[0]->kategori->name }} </a>
                    </p>
                    <form action="{{ route('databuku.edit', $databuku[0]->id) }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-primary shadow">edit</button>
                    </form>
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('databuku.destroy', $databuku[0]->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger shadow">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@else
<p class="text-center fs-4">no book found</p>
@endif
@endsection
