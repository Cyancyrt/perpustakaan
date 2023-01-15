@extends('layout.main')

@section('container')
<div class="row mt-5 mb-5">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Input gagal.<br><br>
        @foreach ($errors->all() as $error)
        <br>{{ $error }}<br>
        @endforeach
    </div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <div class="d-flex justify-content-center">
                    <h2>TAMBAH BUKU</h2>
                </div>
                <div class="card-text">
                    <form action="{{ route('databuku.store') }}" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            {{ csrf_field() }}
                            <div class="col-6">
                                <div class="row d-flex justify-content-center">
                                    <div class="form-group">
                                        <h5 style="font-weight:bold ;">JUDUL:</h5>
                                        <input type="text" name="title" class="form-control" placeholder="JUDUL">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <h5 style="font-weight:bold ;">ID BUKU:</h5>
                                        <input type="number" name="bookid" class="form-control" placeholder="ID BUKU">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <h5 style="font-weight:bold ;">Kategori: </h5>
                                        <select class="form-control" name="kategori_id">
                                            <option value="">--pilih--</option>
                                            @foreach($kategori as $a)
                                            <option value='{{ $a->id}}'> {{ $a->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <h5 style="font-weight:bold ;">Quantity: </h5>
                                        <input type="number" name="qty" id="" min="1" max="20" required value="0">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card-text">
                                    <div class="glass">
                                        <div class="image form-group d-flex mt-2 justify-content-center" style="height: 200px ;">
                                            <img src="https://www.w3schools.com/w3images/avatar5.png" id="image" alt="" style="cursor:pointer ;">
                                            <input id="imageUpload" type="file" name="image" class="form-control" style="display:none ;" capture>
                                        </div>
                                        <h3 class=" text-center">sampul</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <a href="{{ route('databuku.databuku') }}"> back </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
