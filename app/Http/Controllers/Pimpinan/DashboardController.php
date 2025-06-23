<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\PermintaanZoom;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPeminjaman = Peminjaman::count();
        $totalZoom = PermintaanZoom::count();

        return view('pimpinan.dashboard', compact('totalPeminjaman', 'totalZoom'));
    }
}
