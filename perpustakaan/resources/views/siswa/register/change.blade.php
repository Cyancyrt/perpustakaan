@error('nisn')
<p style="color: red;">{{ $message }}</p>
@enderror
@foreach($datasiswa as $siswa)
<form action="{{ route('change.post', $siswa->id) }}" method="POST" enctype="multipart/form-data">
    @endforeach
    @csrf
    <div class="form-group">
        <strong>confirm account</strong>
        <input type="number" name="nisn" class="form-control" placeholder="Password">
    </div>
    <div class="form-group">
        <strong>New Password</strong>
        <input type="text" name="password" class="form-control" placeholder="Password">
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
