@extends('layouts.pimpinan')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Laporan Peminjaman & Fasilitas Zoom</h1>

    {{-- Bagian 1: Laporan Peminjaman --}}
    <div class="bg-white p-4 shadow rounded mb-8">
        <h2 class="text-xl font-semibold mb-4">Laporan Peminjaman Barang</h2>
        <table class="w-full text-sm border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 border">Nama Pegawai</th>
                    <th class="p-2 border">Barang</th>
                    <th class="p-2 border">Tgl Pinjam</th>
                    <th class="p-2 border">Tgl Kembali</th>
                    <th class="p-2 border">Keperluan</th>
                    <th class="p-2 border">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($peminjaman as $data)
                    <tr>
                        <td class="p-2 border">{{ $data->user->name }}</td>
                        <td class="p-2 border">{{ $data->barang->nama_barang }}</td>
                        <td class="p-2 border">{{ $data->tanggal_pinjam }}</td>
                        <td class="p-2 border">{{ $data->tanggal_kembali }}</td>
                        <td class="p-2 border">{{ $data->keperluan }}</td>
                        <td class="p-2 border capitalize">{{ $data->status }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center p-4 text-gray-500">Tidak ada data peminjaman.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Bagian 2: Laporan Permintaan Zoom --}}
    <div class="bg-white p-4 shadow rounded">
        <h2 class="text-xl font-semibold mb-4">Laporan Permintaan Fasilitas Zoom</h2>
        <table class="w-full text-sm border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 border">Nama Pegawai</th>
                    <th class="p-2 border">Barang Zoom</th>
                    <th class="p-2 border">Tanggal</th>
                    <th class="p-2 border">Keperluan</th>
                    <th class="p-2 border">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($zoom as $data)
                    <tr>
                        <td class="p-2 border">{{ $data->user->name }}</td>
                        <td class="p-2 border">{{ $data->barang->nama_barang }}</td>
                        <td class="p-2 border">{{ $data->tanggal }}</td>
                        <td class="p-2 border">{{ $data->keterangan }}</td>
                        <td class="p-2 border capitalize">{{ $data->status }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center p-4 text-gray-500">Tidak ada data permintaan Zoom.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
