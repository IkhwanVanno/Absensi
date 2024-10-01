<?php

namespace Database\Seeders;

use App\Models\mahasiswa;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('mahasiswas')->insert([
            'nim'=>'070108',
            'nik'=>'00700715',
            'password'=>Hash::make('afsm'),
            'name'=>'farel nanda',
            'jurusan'=>'informatika',
            'tanggal_lahir'=>'12-3-2002',
            'alamat'=>'jl.pluto',
        ]); 

        DB::table('admins')->insert([
            'nim'=>'150707',
            'password'=>Hash::make('afsm'),
            'nama'=>'farel nanda',
            'jabatan'=>'programer',
        ]);
    }
}
