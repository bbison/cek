<?php

namespace App\Http\Controllers;

use App\Models\pinjaman;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\simpanan;
use App\Models\profil;
use App\Models\simpanan_Wajib;


class laporan_controller extends Controller
{
    public function simpananPokok()
    {
       return view('laporan.simpananPokok',[
        'user'=>User::orderBy('name','ASC')->get(),
        'profil'=>profil::find(1)
       ]);
    }
    public function simpananWajib()
    {
        return view('laporan.simpananWajib',[
            'user'=>User::orderBy('name','ASC')->get(),
            'sWajib'=>simpanan_Wajib::all(),
            'profil'=>profil::find(1)
        ]);
    }
    public function simpananSukarela()
    {
        return view('laporan.simpananSukarela',[
            'user'=>User::orderBy('name','ASC')->get(),
            'profil'=>profil::find(1)
        ]);
    }
    public function angsuran()
    {
        return view('laporan.angsuran',[
            'pinjaman'=>pinjaman::orderBy('id', 'ASC')->get(),
            'profil'=>profil::find(1)
        ]);
    }
    
    public function anggota()
    {
        return view('laporan.anggota',[
            'anggota'=>user::orderBy('name','ASC')->get(),
            'profil'=>profil::find(1)
        ]);
    }

    // pinjaman::find($request->id_pinjaman)->update([
    //     'angsuran_terbayar'=>angsuran::where('pinjaman_id', $request->pinjaman_id)->where('status', 'Sudah Bayar')->sum('tagihan_angsuran'),
    //     'angsuran_belum_terbayar'=>angsuran::where('pinjaman_id', $request->pinjaman_id)->where('status', 'Belum Bayar')->sum('tagihan_angsuran')
    //  ]);
}
