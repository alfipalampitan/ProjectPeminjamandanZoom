<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Instansi;
use Illuminate\Http\Request;
use App\Models\PermintaanZoom;
use Illuminate\Support\Facades\Auth;

class PermintaanZoomController extends Controller
{
    public function index()
    {
        $permintaan = PermintaanZoom::where('user_id', Auth::id())->get();
        return view('pegawai.zoom.riwayat_zoom', compact('permintaan'));
    }

    public function create()
    {
        $barangZoom = Barang::where('kategori', 'zoom')->get();
        $instansis = Instansi::all();
        return view('pegawai.zoom.create', compact('barangZoom', 'instansis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'nama_kegiatan' => 'required|string',
            'instansi_id' => 'required|exists:instansis,id',
            'tanggal' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
            'keterangan' => 'required|string',
        ]);

        // Cek jadwal tabrakan
        $bentrok = \App\Models\PermintaanZoom::where('barang_id', $request->barang_id)
            ->where('tanggal', $request->tanggal)
            ->where(function ($query) use ($request) {
                $query->whereBetween('jam_mulai', [$request->jam_mulai, $request->jam_selesai])
                    ->orWhereBetween('jam_selesai', [$request->jam_mulai, $request->jam_selesai])
                    ->orWhere(function ($q) use ($request) {
                        $q->where('jam_mulai', '<=', $request->jam_mulai)
                            ->where('jam_selesai', '>=', $request->jam_selesai);
                    });
            })
            ->where('status', '!=', 'ditolak')
            ->exists();

        if ($bentrok) {
            return back()->withInput()->with('error', 'Jadwal bertabrakan dengan jadwal lain.');
        }


        PermintaanZoom::create([
            'user_id' => Auth::id(),
            'barang_id' => $request->barang_id,
            'nama_kegiatan' => $request->nama_kegiatan,
            'instansi_id' => $request->instansi_id,
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'keterangan' => $request->keterangan,
            'status' => 'menunggu',
        ]);

        return redirect()->route('zoom.index')->with('success', 'Permintaan berhasil dikirim.');
    }
}
