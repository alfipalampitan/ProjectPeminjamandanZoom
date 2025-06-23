@extends('layouts.pimpinan')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Dashboard Pimpinan</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-gray-700 font-semibold">Total Peminjaman</h2>
            <p class="text-3xl text-blue-600">{{ $totalPeminjaman }}</p>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-gray-700 font-semibold">Total Permintaan Zoom</h2>
            <p class="text-3xl text-indigo-600">{{ $totalZoom }}</p>
        </div>
    </div>

    <div class="mt-6">
        <a href="{{ route('pimpinan.laporan') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
            Lihat Laporan Lengkap
        </a>
    </div>
@endsection
