@extends('layouts.admin')

@section('content')

<h2 class="text-2xl font-bold mb-6">Verifikasi Peminjaman</h2>

@if (session('success'))
    <p class="bg-green-800 text-green-200 p-3 rounded mb-6">
        {{ session('success') }}
    </p>
@endif

<div class="overflow-auto">
    <table class="w-full text-sm bg-slate-800 rounded-xl overflow-hidden">
        <thead class="bg-slate-700 text-slate-300">
            <tr>
                <th class="p-3 text-left">Nama</th>
                <th class="p-3 text-left">Barang</th>
                <th class="p-3 text-left">Tgl Pinjam</th>
                <th class="p-3 text-left">Tgl Kembali</th>
                <th class="p-3 text-left">Keperluan</th>
                <th class="p-3 text-left">Status</th>
                <th class="p-3 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($semua as $item)
                <tr class="border-t border-slate-700 hover:bg-slate-700/50">
                    <td class="p-3">{{ $item->user->name }}</td>
                    <td class="p-3">{{ $item->barang->nama_barang }}</td>
                    <td class="p-3">{{ $item->tanggal_pinjam }}</td>
                    <td class="p-3">{{ $item->tanggal_kembali }}</td>
                    <td class="p-3">{{ $item->keperluan }}</td>
                    <td class="p-3 capitalize">
                        @if ($item->status === 'menunggu')
                            <span class="text-yellow-400 font-medium">{{ $item->status }}</span>
                        @elseif ($item->status === 'disetujui')
                            <span class="text-green-400 font-medium">{{ $item->status }}</span>
                        @elseif ($item->status === 'ditolak')
                            <span class="text-red-400 font-medium">{{ $item->status }}</span>
                        @elseif ($item->status === 'selesai')
                            <span class="text-blue-400 font-medium">{{ $item->status }}</span>
                        @else
                            <span class="text-slate-300">{{ $item->status }}</span>
                        @endif
                    </td>

                    <td class="p-3 space-x-2">
                        @if ($item->status === 'menunggu')
                            <form action="{{ route('admin.peminjaman.verifikasi', $item->id) }}" method="POST" class="inline">
                                @csrf
                                <input type="hidden" name="status" value="disetujui">
                                <button class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded text-sm">Setujui</button>
                            </form>

                            <form action="{{ route('admin.peminjaman.verifikasi', $item->id) }}" method="POST" class="inline">
                                @csrf
                                <input type="hidden" name="status" value="ditolak">
                                <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm">Tolak</button>
                            </form>

                        @elseif ($item->status === 'disetujui')
                            <form action="{{ route('admin.peminjaman.selesai', $item->id) }}" method="POST" class="inline">
                                @csrf
                                <button class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm">Selesai</button>
                            </form>
                        @else
                            <span class="italic text-slate-400">Sudah diverifikasi</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="p-4 text-center text-slate-400">Tidak ada data peminjaman.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
