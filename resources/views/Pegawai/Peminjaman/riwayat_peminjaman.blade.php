@extends('layouts.pegawai')

@section('content')
    <h2 class="text-xl font-bold mb-4">Riwayat Peminjaman</h2>

    <table class="table-auto w-full bg-white shadow rounded">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-2">Barang</th>
                <th class="p-2">Tanggal Pinjam</th>
                <th class="p-2">Tanggal Kembali</th>
                <th class="p-2">Keperluan</th>
                <th class="p-2">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($riwayat as $item)
                <tr class="border-t">
                    <td class="p-2">{{ $item->barang->nama_barang }}</td>
                    <td class="p-2">{{ $item->tanggal_pinjam }}</td>
                    <td class="p-2">{{ $item->tanggal_kembali }}</td>
                    <td class="p-2">{{ $item->keperluan }}</td>
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
            @endforeach
        </tbody>
    </table>
@endsection
