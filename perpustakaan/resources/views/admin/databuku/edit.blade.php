@extends('layout.main')

@section('container')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Buku</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('databuku.databuku') }}" enctype="multipart/form-data"> Back</a>
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
        <form action="{{ route('databuku.update', $databuku->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="title" value="{{ old('bookid',$databuku->title) }}" class="form-control" placeholder="Name">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Book Id:</strong>
                        <input type="number" name="bookid" value="{{ old('bookid',$databuku->bookid) }}" class="form-control" placeholder="NISN">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Qty:</strong>
                        <input type="number" name="qty" class="form-control" value="{{ old('bookid',$databuku->qty) }}" min="1" max="20">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Sampul:</strong>
                        <input type="File" name="image" class="form-control">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary ml-3">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
