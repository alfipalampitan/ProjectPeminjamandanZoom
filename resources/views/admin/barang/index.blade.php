@extends('layouts.admin')

@section('content')

<h2 class="text-2xl font-bold mb-6">Data Barang</h2>

<a href="{{ route('admin.barang.create') }}"
    class="mb-6 inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded font-semibold transition">
    + Tambah Barang
</a>

@if(session('success'))
    <p class="bg-green-800 text-green-200 p-3 rounded mb-6">
        {{ session('success') }}
    </p>
@endif

<div class="overflow-auto">
    <table class="w-full text-sm bg-slate-800 rounded-xl overflow-hidden">
        <thead class="bg-slate-700 text-slate-300">
            <tr>
                <th class="p-3 text-left">Nama</th>
                <th class="p-3 text-left">Kategori</th>
                <th class="p-3 text-left">Jumlah</th>
                <th class="p-3 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($barangs as $barang)
            <tr class="border-t border-slate-700 hover:bg-slate-700/50">
                <td class="p-3">{{ $barang->nama_barang }}</td>
                <td class="p-3 capitalize">{{ $barang->kategori }}</td>
                <td class="p-3">{{ $barang->jumlah }}</td>
                <td class="p-3 flex gap-2">
                    <form action="{{ route('admin.barang.destroy', $barang->id) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin hapus?')" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button
                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm transition">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="p-4 text-center text-slate-400">Tidak ada data barang.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
