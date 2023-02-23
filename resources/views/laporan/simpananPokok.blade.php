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
            <hr>
            <h4 class="text-center">Laporan Simpanan Pokok</h4>

            <table class="table">
                <tr class="">
                    <th>Nama</th>
                    <th>Simpanan Pokok</th>
                    <th>Simpanan Wajib</th>
                    <th>Simpanan Sukarela</th>
                    <th>Total</th>
                </tr>

                @foreach ($user as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>@format($user->simpanan_pokok)</td>
                        <td>@format($user->simpanan_wajib)</td>
                        <td>@format($user->simpanan_sukarela)</td>
                        <th>@format($user->simpanan_sukarela + $user->simpanan_wajib + $user->simpanan_pokok)</th>
                    </tr>
                @endforeach
                <tr class="">
                    <th>Total</th>
                    <th>@format($user->sum('simpanan_pokok'))</th>
                    <th>@format($user->sum('simpanan_wajib'))</th>
                    <th>@format($user->sum('simpanan_sukarela'))</th>
                    <th>@format($user->sum('simpanan_sukarela') + $user->sum('simpanan_wajib') + $user->sum('simpanan_pokok'))</th>
                </tr>
            </table>
        </div>
    </div>
@endsection
