<?php

namespace App\Http\Controllers\Admin;

use App\Models\Barang;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PeminjamanAdminController extends Controller
{
    public function index()
    {
        $semua = Peminjaman::with(['user', 'barang'])->orderBy('created_at', 'desc')->get();
        return view('admin.peminjaman.index', compact('semua'));
    }


    public function verifikasi(Request $request, $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->status = $request->status;
        $peminjaman->save();

        // Kurangi stok barang jika disetujui
        if ($request->status === 'disetujui') {
            $barang = $peminjaman->barang;
            if ($barang && $barang->jumlah > 0) {
                $barang->jumlah -= 1;
                $barang->save();
            }
        }

        return back()->with('success', 'Status berhasil diperbarui.');
    }

    public function selesai($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        if ($peminjaman->status !== 'disetujui') {
            return back()->with('error', 'Hanya bisa menyelesaikan peminjaman yang disetujui.');
        }

        // Tambahkan jumlah barang kembali
        $barang = Barang::find($peminjaman->barang_id);
        if ($barang) {
            $barang->jumlah += 1; // atau sesuaikan dengan jumlah yang dipinjam jika lebih dari 1
            $barang->save();
        }

        $peminjaman->status = 'selesai';
        $peminjaman->save();

        return back()->with('success', 'Peminjaman ditandai sebagai selesai.');
    }
}
