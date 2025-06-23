<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Peminjaman;
use App\Models\PermintaanZoom;

class DashboardController extends Controller
{
    public function index()
    {
        $peminjamanSaya = Peminjaman::where('user_id', Auth::id())->count();
        $permintaanZoomSaya = PermintaanZoom::where('user_id', Auth::id())->count();

        return view('pegawai.dashboard', compact('peminjamanSaya', 'permintaanZoomSaya'));
    }
}
