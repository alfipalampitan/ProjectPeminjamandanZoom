<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\PermintaanZoom;
use Illuminate\Support\Facades\Auth;

class StatusController extends Controller
{
    public function index()
    {
        $peminjamans = Peminjaman::with('barang')->where('user_id', Auth::id())->get();
        $permintaanZoom = PermintaanZoom::with('barang')->where('user_id', Auth::id())->get();

        return view('pegawai.status', compact('peminjamans', 'permintaanZoom'));
    }
}
