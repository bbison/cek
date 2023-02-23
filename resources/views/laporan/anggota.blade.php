@extends('layouts.sidebar')
@section('body')
    <div class="col-12 d-flex justify-content-center">
        <div class="col-11 mt-3">

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
            <h4 class="text-center">Laporan Data Anggota</h4>
  
        <table class="table">
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jumlah Simpanan Wajib</th>
                <th>Jumlah Simpanan Pokok</th>
                <th>Jumlah Simpanan Sukarela</th>
                <th>Total Simpanan</th>
            </tr>
            @foreach ($anggota as $anggota)
            <tr>
                <td>{{ $anggota->name }}</td>
                <td>{{ $anggota->alamat }}</td>
                <td>@format($anggota->simpanan_wajib)</td>
                <td>@format($anggota->simpanan_pokok)</td>
                <td>@format($anggota->simpanan_sukarela)</td>
                <td>@format($anggota->simpanan_wajib + $anggota->simpanan_pokok + $anggota->simpanan_sukarela)</td>
            </tr>
                
            @endforeach

          
        </table>
    </div>
    </div>
@endsection
