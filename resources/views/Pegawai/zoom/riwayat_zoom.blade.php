@extends('layouts.pegawai')

@section('content')
    <h2 class="text-xl font-bold mb-4">Riwayat Permintaan Fasilitas Zoom</h2>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full bg-white shadow rounded text-sm">
        <thead class="bg-gray-100 text-left">
            <tr>
                <th class="p-3">Nama Barang</th>
                <th class="p-3">Nama Kegiatan</th>
                <th class="p-3">Tanggal</th>
                <th class="p-3">Keterangan</th>
                <th class="p-3">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($permintaan as $item)
                <tr class="border-t">
                    <td class="p-3">{{ $item->barang->nama_barang ?? '-' }}</td>
                    <td class="p-3">{{ $item->nama_kegiatan }}</td>
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
                <tr>
                    <td colspan="5" class="p-3 text-center text-gray-500">Belum ada permintaan Zoom.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
