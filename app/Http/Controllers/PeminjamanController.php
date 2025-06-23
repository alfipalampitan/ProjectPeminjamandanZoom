<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Barang;
use App\Models\Instansi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function index()
    {
        $riwayat = Peminjaman::where('user_id', Auth::id())->get();
        return view('pegawai.peminjaman.riwayat_peminjaman', compact('riwayat'));
    }


    public function create()
    {
        $barangs = Barang::where('kategori', 'umum')->get();
        $instansis = Instansi::all();
        return view('pegawai.peminjaman.create', compact('barangs', 'instansis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'barang_id' => 'required|exists:barangs,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
            'instansi_id' => 'required|exists:instansis,id',
            'no_telp' => 'required|numeric',
            'keperluan' => 'required|string',
        ]);

        Peminjaman::create([
            'user_id' => Auth::id(),
            'nama' => $request->nama,
            'barang_id' => $request->barang_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'instansi_id' => $request->instansi_id,
            'no_telp' => $request->no_telp,
            'keperluan' => $request->keperluan,
            'status' => 'menunggu',
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'Pengajuan peminjaman berhasil dikirim.');
    }
}
