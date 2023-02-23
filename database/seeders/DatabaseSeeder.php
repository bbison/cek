<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Bagas',
            'password'=>bcrypt('1234'),
            'bagian'=>'ADMIN',
            'alamat'=>'Ungaran'
        ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'admin',
        //     'password'=>bcrypt('1234'),
        //     'hak_akses'=>'Admin',
        //     'alamat'=>'Ungaran'
        // ]);
        \App\Models\profil::create([
            'nama_koperasi'=>'Nama Koperasi',
            'logo'=>'koperasi-1.png',
            'alamat'=>'alamat',
            'telepon'=>'telepon',
            'ketua'=>'ketua',
            'wakil_ketua'=>'wakil_ketua',
            'sekertaris'=>'sekertaris',
            'bendahara'=>'bendahara',
        ]);
    }
}
