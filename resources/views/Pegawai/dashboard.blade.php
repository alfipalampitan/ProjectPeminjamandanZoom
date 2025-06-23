@extends('layouts.pegawai')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Dashboard Pegawai</h1>
    <p>Selamat datang, {{ auth()->user()->name }}!</p>

    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white p-4 shadow rounded">
            <h3 class="font-semibold">Total Peminjaman Barang</h3>
            <p class="text-3xl text-blue-500">{{ $peminjamanSaya }}</p>
        </div>

        <div class="bg-white p-4 shadow rounded">
            <h3 class="font-semibold">Total Permintaan Zoom</h3>
            <p class="text-3xl text-purple-500">{{ $permintaanZoomSaya }}</p>
        </div>
    </div>

    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-4">
        <a href="{{ route('peminjaman.create') }}" class="bg-green-500 hover:bg-green-600 text-white p-3 rounded text-center">
            + Ajukan Peminjaman Barang
        </a>
        <a href="{{ route('zoom.create') }}" class="bg-indigo-500 hover:bg-indigo-600 text-white p-3 rounded text-center">
            + Ajukan Permintaan Zoom
        </a>
    </div>
@endsection
