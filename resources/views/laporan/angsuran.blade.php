@extends('layouts.sidebar')
@section('body')
    <div class="col-12 d-flex justify-content-center">
        <div class="col-10 mt-3">
            <div class="row align-items-center">

                <div class="col-3">
                    @if (url('') == 'http://127.0.0.1:8000')
                        <div class="row justify-content-center">
                            <div class="col-sm-12 d-flex justify-content-center">
                                <img class="img-preview " style="display: block;"
                                    src="{{ url('') . '/logo/' . $profil->logo }} " width="40%">
                            </div>
                        </div>
                    @else
                        <div class="row justify-content-center">
                            <div class="col-sm-12 d-flex justify-content-center">
                                <img class="img-preview " style="display: block;"
                                    src="{{ url('') . '/public/logo/' . $profil->logo }} " width="40%">
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-8 text-center">
                    <h3>Koperasi {{ $profil->nama_koperasi }}</h3>
                    <p>{{ $profil->alamat }} {{ $profil->telepon }}</p>
                </div>
            </div>
            <hr class="mt-4">
            <h4 class="text-center">Laporan Pinjaman</h4>
  
        <table class="table">
            <tr>
                <th>ID </th>
                <th>Nama</th>
                <th>Lama (Bulan)</th>
                <th>Nominal Pinjam</th>
                <th>Nominal Pengembalian</th>
                <th>Angsuran Pokok</th>
                <th>Angsuran Bunga</th>
                <th>Bunga</th>
                <th>Sudah Bayar</th>
                <th>Kekurangan</th>
                <th>status</th>
                <th>Detail</th>
            </tr>

            @foreach ($pinjaman as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->user->name }}</td>
                    <td>{{ $p->lama_pinjaman }}</td>
                    <td>@format($p->angsuran_pokok * $p->lama_pinjaman  )</td>
                    <td>@format($p->total_angsuran )</td>
                    <td>@format($p->angsuran_pokok )</td>
                    <td>@format($p->angsuran_bunga )</td>
                    <td>{{ $p->bunga_pinjaman->bunga }} %</td>
                    <td>@format($p->angsuran_terbayar )</td>
                    <td>@format($p->angsuran_belum_terbayar )</td>
                    <td>{{ $p->status_pinjaman }}</td>
                    {{-- <td>{{ $p->total_angsuran }}</td> --}}
                    <td><a href="/pinjaman/detail/{{ $p->id }}">Angsuran</a></td>
                </tr>
            @endforeach
        </table>
    </div>
    </div>
@endsection
