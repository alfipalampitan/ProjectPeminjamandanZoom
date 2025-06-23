@extends('layouts.pegawai')

@section('content')
    <h2 class="text-xl font-bold mb-4">Status Pengajuan Saya</h2>

    <div class="mb-8">
        <h3 class="text-lg font-semibold mb-2">Peminjaman Barang</h3>
        <table class="w-full bg-white shadow rounded text-sm">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="p-3">Nama Barang</th>
                    <th class="p-3">Tgl Pinjam</th>
                    <th class="p-3">Tgl Kembali</th>
                    <th class="p-3">Keperluan</th>
                    <th class="p-3">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($peminjamans as $item)
                    <tr class="border-t">
                        <td class="p-3">{{ $item->barang->nama_barang }}</td>
                        <td class="p-3">{{ $item->tanggal_pinjam }}</td>
                        <td class="p-3">{{ $item->tanggal_kembali }}</td>
                        <td class="p-3">{{ $item->keperluan }}</td>
                        <td class="p-2 capitalize">
                            @if ($item->status === 'menunggu')
                                <span class="text-gray-500 font-semibold">{{ $item->status }}</span>
                            @elseif ($item->status === 'disetujui')
                                <span class="text-green-600 font-semibold">{{ $item->status }}</span>
                            @elseif ($item->status === 'ditolak')
                                <span class="text-red-600 font-semibold">{{ $item->status }}</span>
                            @elseif ($item->status === 'selesai')
                                <span class="text-blue-600 font-semibold">{{ $item->status }}</span>
                            @else
                                <span>{{ $item->status }}</span>
                            @endif
                        </td>                        
                    </tr>
                @empty
                    <tr><td colspan="5" class="p-3 italic text-gray-500">Belum ada data.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div>
        <h3 class="text-lg font-semibold mb-2">Permintaan Fasilitas Zoom</h3>
        <table class="w-full bg-white shadow rounded text-sm">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="p-3">Barang Zoom</th>
                    <th class="p-3">Tanggal</th>
                    <th class="p-3">Keperluan</th>
                    <th class="p-3">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($permintaanZoom as $item)
                    <tr class="border-t">
                        <td class="p-3">{{ $item->barang->nama_barang }}</td>
                        <td class="p-3">{{ $item->tanggal }}</td>
                        <td class="p-3">{{ $item->keterangan }}</td>
                        <td class="p-2 capitalize">
                            @if ($item->status === 'menunggu')
                                <span class="text-gray-500 font-semibold">{{ $item->status }}</span>
                            @elseif ($item->status === 'disetujui')
                                <span class="text-green-600 font-semibold">{{ $item->status }}</span>
                            @elseif ($item->status === 'ditolak')
                                <span class="text-red-600 font-semibold">{{ $item->status }}</span>
                            @elseif ($item->status === 'selesai')
                                <span class="text-blue-600 font-semibold">{{ $item->status }}</span>
                            @else
                                <span>{{ $item->status }}</span>
                            @endif
                        </td>
                        
                    </tr>
                @empty
                    <tr><td colspan="4" class="p-3 italic text-gray-500">Belum ada data.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
