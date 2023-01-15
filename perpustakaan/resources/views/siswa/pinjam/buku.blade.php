@extends('layout.second')

@section('container')
<div class="container mt-3">
    <div class="row">
        <div class="col">
            <div class="form-group">
                <table class="table">
                    <tr>
                        <th>
                            no
                        </th>
                        <th>
                            id buku
                        </th>
                        <th>
                            judul
                        </th>
                        <th>
                            jumlah peminjaman
                        </th>
                        <th>
                            status peminjaman
                        </th>
                        <th>
                            tanggal peminjaman
                        </th>
                        <th>
                            tanggal pengembalian
                        </th>
                        <th>
                            penalty
                        </th>
                    </tr>
                    @foreach($user->pinjam as $buku)
                    <tr style="border-top:hidden ;">
                        <td>
                            {{ $buku->id }}
                        </td>
                        <td>
                            {{ $buku->book_id }}
                        </td>
                        <td>
                            <div style="color:blue;" detail-id="{{ $buku->id }}" id="details" type="button">
                                {{ $buku->title }}
                            </div>
                            <button type="button" class="buttonTog" id="detail-{{ $buku->id }}" data-toggle="modal" data-target="#exampleModalCenter">
                                <a id="detail" data-judul="{{ $buku->title }}" data-idbuku="{{ $buku->book_id }}" data-sinopsis="{{ $buku->sinopsis }}" data-qty="{{ $buku->qty }}"> detail</a>
                            </button>
                            @include('partial.modal')
                        </td>
                        <td>
                            @if($buku->qty > 0 )
                            {{ $buku->qty }}
                            @elseif($buku->qty < 1) dikembalikan @endif </td>
                        <td>
                            {{ $buku->status->name }}
                        </td>
                        <td>
                            {{ $buku->borrow_date }}
                        </td>
                        <td>
                            @if($buku->status_id ==1 )
                            <button class="btn btn-danger" disabled>tunggu konfirmasi</button>
                            @else ($buku->status_id != 1)
                            {{ $buku->expire_date }}
                            @endif
                        </td>
                        <td>
                            @if($buku->status_id == 2)
                            @if($dif >= 0)
                            ------
                            @elseif ($dif < 0) RP.{{ $sum }} @endif @endif </td>
                        <td>
                            @if($buku->status_id == 2)
                            <form action="{{ route('return', $buku->id)}}" method="POST">
                                @csrf
                                <button type="submit">return</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <div>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>
                                no
                            </th>
                            <th>
                                id buku
                            </th>
                            <th>
                                judul
                            </th>
                            <th>
                                jumlah peminjaman
                            </th>
                            <th>
                                status peminjaman
                            </th>
                            <th>
                                tanggal peminjaman
                            </th>
                            <th>
                                tanggal pengembalian
                            </th>
                            <th>
                                penalty
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user->pinjam as $buku)
                        <tr>
                            <td>
                                {{ $buku->id }}
                            </td>
                            <td>
                                {{ $buku->book_id }}
                            </td>
                            <td>
                                <div style="color:blue;" detail-id="{{ $buku->id }}" id="details" type="button">
                                    {{ $buku->title }}
                                </div>
                                <button type="button" class="buttonTog" id="detail-{{ $buku->id }}" data-toggle="modal" data-target="#exampleModalCenter">
                                    <a id="detail" data-judul="{{ $buku->title }}" data-idbuku="{{ $buku->book_id }}" data-sinopsis="{{ $buku->sinopsis }}" data-qty="{{ $buku->qty }}"> detail</a>
                                </button>
                                @include('partial.modal')
                            </td>
                            <td>
                                @if($buku->qty > 0 )
                                {{ $buku->qty }}
                                @elseif($buku->qty < 1) dikembalikan @endif </td>
                            <td>
                                {{ $buku->status->name }}
                            </td>
                            <td>
                                {{ $buku->borrow_date }}
                            </td>
                            <td>
                                @if($buku->status_id ==1 )
                                <button class="btn btn-danger" disabled>tunggu konfirmasi</button>
                                @else ($buku->status_id != 1)
                                {{ $buku->expire_date }}
                                @endif
                            </td>
                            <td>
                                @if($buku->status_id == 2)
                                @if($dif >= 0)
                                ------
                                @elseif ($dif < 0) RP.{{ $sum }} @endif @endif </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

<style>
    .buttonTog {
        display: none;
    }

    td,
    th {
        width: 120px;
    }
</style>
