@extends('layout.main')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="float-left">
                <h2>Data Siswa</h2>
            </div>
            <div>
                <h6>
                    <form action="{{ route('datasiswa.create') }}" style="text-align:left ;">
                        <button type="submit" class="btn btn-sm btn-danger shadow">create</button>
                    </form>
                    <table>
                        <tr>
                            <td>
                                NAMA
                            </td>
                            <td>
                                NISN
                            </td>
                            <td>
                                username
                            </td>
                            <td>
                                email
                            </td>
                            <td>
                                Password
                            </td>
                            <td>
                                Delete
                            </td>
                            <td>
                                Edit
                            </td>
                        </tr>
                        @foreach($datasiswa as $siswa)
                        <tr>
                            <td>
                                {!! $siswa->name !!}
                            </td>
                            <td>
                                {{ $siswa->nisn }}
                            </td>
                            <td>
                                {{ $siswa->username }}
                            </td>
                            <td>
                                {{ $siswa->email }}
                            </td>
                            <td>
                                {{ $siswa->password }}
                            </td>
                            <td>
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('datasiswa.destroy', $siswa->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger shadow">Delete</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('datasiswa.edit', $siswa->id) }}" style="text-align:left ;">
                                    <button type="submit" class="btn btn-danger shadow">edit</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    @if (session()->has('sukses'))
                    <p style="color: green;">{{ session()->get('sukses') }}</p>
                    @endif
                </h6>
            </div>
        </div>
    </div>
</div>
@endsection
