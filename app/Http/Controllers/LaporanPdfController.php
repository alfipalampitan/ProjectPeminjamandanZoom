<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\PermintaanZoom;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanPdfController extends Controller
{
    public function form(Request $request)
    {
        $data = [];

        if ($request->has(['jenis', 'bulan', 'tahun'])) {
            $request->validate([
                'jenis' => 'required|in:peminjaman,zoom',
                'bulan' => 'required|date_format:m',
                'tahun' => 'required|date_format:Y',
            ]);

            if ($request->jenis == 'peminjaman') {
                $data = \App\Models\Peminjaman::with('user', 'barang')
                    ->whereYear('tanggal_pinjam', $request->tahun)
                    ->whereMonth('tanggal_pinjam', $request->bulan)
                    ->get();
            } else {
                $data = \App\Models\PermintaanZoom::with('user', 'barang')
                    ->whereYear('tanggal', $request->tahun)
                    ->whereMonth('tanggal', $request->bulan)
                    ->get();
            }
        }

        return view('admin.laporan.form', compact('data'));
    }


    public function generate(Request $request)
    {
        $request->validate([
            'jenis' => 'required|in:peminjaman,zoom',
            'bulan' => 'required|date_format:m',
            'tahun' => 'required|date_format:Y',
        ]);

        $jenis = $request->jenis;
        $bulan = $request->bulan;
        $tahun = $request->tahun;

        if ($jenis === 'peminjaman') {
            $data = Peminjaman::with('user', 'barang')
                ->whereYear('tanggal_pinjam', $tahun)
                ->whereMonth('tanggal_pinjam', $bulan)
                ->get();

            $pdf = Pdf::loadView('admin.laporan.pdf_peminjaman', compact('data', 'bulan', 'tahun'));
        } else {
            $data = PermintaanZoom::with('user', 'barang', 'instansi')
                ->whereYear('tanggal', $tahun)
                ->whereMonth('tanggal', $bulan)
                ->get();

            $pdf = Pdf::loadView('admin.laporan.pdf_zoom', compact('data', 'bulan', 'tahun'));
        }

        return $pdf->stream('laporan-' . $jenis . '-' . $bulan . '-' . $tahun . '.pdf');
    }
}
