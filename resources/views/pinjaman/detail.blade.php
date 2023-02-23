@extends('layouts.sidebar')
@section('body')
<div class="d-flex justify-content-center">
<div class="col-6">
    <h3>ID Pinjaman : {{ $pinjaman->user->id }}</h3>
    <h3>Nama Peminjam : {{ $pinjaman->user->name }}</h3>

    <table class="table-bordered table border-secondary mt-3">
        <tr class="text-center">
            <th>Jatuh Tempo</th>
            <th>Total Tagihan</th>
            <th>Keterangan</th>
            <th>Kwitansi</th>
        </tr>
        @foreach ($pinjaman->angsuran as $angsuran)
            <tr>
                <td>{{ $angsuran->jatuh_tempo }}</td>
                <td>@format($angsuran->tagihan_angsuran)</td>
                <td>
                    {{ $angsuran->status }}
                </td>
                <td class="">
                    @if($angsuran->status == 'Sudah Bayar')
                    <a class="btn btn-success col-8" href="">Download</a>
                    @endif
                </td>
           </tr>
        @endforeach
    </table>
    @if ($pinjaman->status_pinjaman == "Ditolak")
        <span class="text-danger">Pinjaman Ditolak</span>
    @endif
</div>
</div>
@endsection
