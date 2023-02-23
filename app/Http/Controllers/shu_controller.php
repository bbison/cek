<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\shu;
use App\Models\User;
use App\Models\profil;
use App\Models\pembagian_shu;

class shu_controller extends Controller
{
    
    public function index(){

        // total simpanan
        $simpanan_wajib = User::sum('simpanan_wajib');
        $simpanan_pokok = User::sum('simpanan_pokok');
        $simpanan_sukarela = User::sum('simpanan_sukarela');

        //total bunga
        // dd(User::)

        $total_shu = $simpanan_pokok + $simpanan_sukarela + $simpanan_wajib;
        return view('shu.index',[
            'shu_user'=>user::all(),
            'profil'=>profil::find(1),
            'total_shu'=> $total_shu
        ]);
    }
    public function store(Request $request)
    {
        dd($request);
        shu::create([
            'besar_shu'=>$request->besarshu
        ]);

        return back()->with('pesan', 'SHU Berhasil DItambah');
    }
    public function update(Request $request)
    {
        shu::Find($request->idshu)->update([
            'besar_shu'=>$request->besarshu
        ]);
        return back()->with('pesan', 'Berhasil Edit SHU');
    }

    public function destroy($id)
    {
        shu::find($id)->delete();
        return back()->with('pesan', 'Berhasil Hapus SHU');
    }

    public function penerima($idshu)
    {
        return view('shu.penerima',[
            'penerima'=>pembagian_shu::where('shu_id',$idshu)->get(),
            'profil'=>profil::find(1)
        ]);
    }
    public function bagi(Request $request)
    {
       $shu = shu::find($request->id_shu);
       $nominal = intval($shu->besar_shu);

       $user = user::all();
       $jumlah_user = $user->count();

       $n = $nominal/$jumlah_user;

       if(pembagian_shu::firstWhere('shu_id',$shu->id)->count() >= 1){
        return back()->with('pesan', 'SHU Sudah Dibagi');
       }

       foreach($user as $u){
        pembagian_shu::create([
            'user_id'=>$u->id,
            'shu_id'=>$shu->id,
            'nama'=>$u->name,
            'nominal'=>$n
           ]);
       }

       return back()->with('pesan', 'SHU Berhasil Dibagi');
    }
    public function pengaturan()
    {
            return view('shu.pengaturan',[
                'shu'=>shu::all(),
                'profil'=>profil::find(1)
            ]);   
    }

    public function logicPengaturan(Request $request)
    {
        dd($request);
    }
 
}
