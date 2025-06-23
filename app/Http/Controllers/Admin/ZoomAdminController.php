<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PermintaanZoom;
use Illuminate\Http\Request;

class ZoomAdminController extends Controller
{
    public function index()
    {
        $semua = PermintaanZoom::with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.zoom.index', compact('semua'));
    }

    public function verifikasi(Request $request, $id)
    {
        $zoom = PermintaanZoom::findOrFail($id);
        $zoom->status = $request->status;
        $zoom->save();

        // Kurangi stok barang jika disetujui
        if ($request->status === 'disetujui') {
            $barang = $zoom->barang;
            if ($barang && $barang->jumlah > 0) {
                $barang->jumlah -= 1;
                $barang->save();
            }
        }

        return back()->with('success', 'Status permintaan Zoom diperbarui.');
    }

    public function selesai($id)
    {
        $zoom = PermintaanZoom::findOrFail($id);
        $zoom->update(['status' => 'selesai']);

        // Jika ingin menambah kembali stok barang:
        if ($zoom->barang) {
            $zoom->barang->increment('jumlah');
        }

        return redirect()->back()->with('success', 'Permintaan Zoom ditandai sebagai selesai.');
    }
}
