@extends('layout.main')

@section('container')
<div class="container">
    <div class="row">
        <div class="col">
            <table>
                <tr>
                    <th>
                        user
                    </th>
                    <th>
                        nisn
                    </th>
                    <th>
                        id buku
                    </th>
                    <th>
                        judul
                    </th>
                    <th>
                        status
                    </th>
                </tr>
                @foreach($pinjam as $pinjaman)
                <tr>
                    <td>
                        <div>
                            {{ $pinjaman->user }}
                        </div>
                    </td>
                    <td>
                        <div>
                            {{ $pinjaman->nisn }}
                        </div>
                    </td>
                    <td>
                        <div>
                            {{ $pinjaman->book_id }}
                        </div>
                    </td>
                    <td>
                        <div>
                            {{ $pinjaman->title }}
                        </div>
                    </td>
                    <td>
                        @if ($pinjaman->status_id == 1)
                        <form action="{{ route('updateCon', $pinjaman->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger shadow">{{ $pinjaman->status->name }}</button>
                        </form>
                        @else
                        {{ $pinjaman->status->name }}
                        @endif
                    </td>

                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
