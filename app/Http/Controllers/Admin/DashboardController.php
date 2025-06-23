<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\PermintaanZoom;
use App\Models\Barang;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBarang = \App\Models\Barang::sum('jumlah');
        $peminjamanMenunggu = \App\Models\Peminjaman::where('status', 'menunggu')->count();
        $permintaanZoom = \App\Models\PermintaanZoom::where('status', 'menunggu')->count();

        return view('admin.dashboard', compact('totalBarang', 'peminjamanMenunggu', 'permintaanZoom'));
    }
}
