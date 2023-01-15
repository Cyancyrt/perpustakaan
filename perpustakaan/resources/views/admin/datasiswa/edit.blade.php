@extends('layout.main')

@section('container')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('datasiswa.datasiswa') }}" enctype="multipart/form-data"> Back</a>
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
        <form action="{{ route('datasiswa.update', $datasiswa->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" value="" class="form-control" placeholder="Name">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>NISN:</strong>
                        <input type="number" name="nisn" class="form-control" placeholder="NISN">
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
