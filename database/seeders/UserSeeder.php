<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Kominfo',
            'email' => 'admin@kominfo.go.id',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'instansi_id' => '1',
        ]);

        User::create([
            'name' => 'Pimpinan Dinas',
            'email' => 'pimpinan@kominfo.go.id',
            'password' => Hash::make('password'),
            'role' => 'pimpinan',
            'instansi_id' => '2',
        ]);

        User::create([
            'name' => 'Pegawai',
            'email' => 'pegawai@kominfo.go.id',
            'password' => Hash::make('password'),
            'role' => 'pegawai',
            'instansi_id' => '1',
        ]);
    }
}
