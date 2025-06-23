<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\PermintaanZoom;

class LaporanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::with('user')->orderBy('created_at', 'desc')->get();
        $zoom = PermintaanZoom::with('user', 'barang')->orderBy('created_at', 'desc')->get();

        return view('pimpinan.laporan.index', compact('peminjaman', 'zoom'));
    }
}
