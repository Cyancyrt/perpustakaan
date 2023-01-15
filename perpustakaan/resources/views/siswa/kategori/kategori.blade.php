@extends('layout.second')

@section('container')

<h3 class="mb-5"> Post Categories </h3>

<div class="container">
    <div class="row">
        @foreach( $kategori as $a )
        <div class="col-md-4">
            <a href="/categories/{{ $a->slug }}">
                <div class="card bg-dark text-white">
                    <img src="https://source.unsplash.com/500x500? {{ $a->name }} " class="card-img" alt=" {{ $a->name }} ">
                    <div class="card-img-overlay d-flex align-item-center">
                        <h5 class="card-title text-center flex-fill" style="background-color : rgba(0,0,0,0.7) ">{{ $a->name }}</h5>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>


@endsection
