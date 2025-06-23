@extends('layouts.admin')

@section('content')

<div class="min-h-screen bg-slate-900 text-slate-100 p-6">

    <h1 class="text-3xl font-bold mb-6">Dashboard Admin</h1>
    <p class="mb-8">Selamat datang, <span class="font-semibold">{{ auth()->user()->name }}</span>!</p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- Peminjaman Menunggu -->
        <div class="bg-slate-800 p-6 rounded-xl shadow-lg hover:shadow-xl transition">
            <h3 class="font-medium text-slate-300 mb-2">Peminjaman Menunggu</h3>
            <p class="text-3xl font-bold text-blue-400">{{ $peminjamanMenunggu }}</p>
        </div>

        <!-- Permintaan Zoom -->
        <div class="bg-slate-800 p-6 rounded-xl shadow-lg hover:shadow-xl transition">
            <h3 class="font-medium text-slate-300 mb-2">Permintaan Zoom</h3>
            <p class="text-3xl font-bold text-yellow-400">{{ $permintaanZoom }}</p>
        </div>

        <!-- Total Barang -->
        <div class="bg-slate-800 p-6 rounded-xl shadow-lg hover:shadow-xl transition">
            <h3 class="font-medium text-slate-300 mb-2">Total Barang</h3>
            <p class="text-3xl font-bold text-green-400">{{ $totalBarang }}</p>
        </div>

    </div>

</div>

@endsection
