<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Instansi;

class InstansiSeeder extends Seeder
{
    public function run(): void
    {
        Instansi::create([
            'nama_instansi' => 'Dinas Kominfo',
        ]);

        Instansi::create([
            'nama_instansi' => 'Dinas Pendidikan',
        ]);

        Instansi::create([
            'nama_instansi' => 'Dinas Kesehatan',
        ]);
    }
}
