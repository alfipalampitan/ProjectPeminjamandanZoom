@extends('layouts.admin')

@section('content')

<div class="p-6">

    <h1 class="text-2xl font-bold mb-6 text-slate-100">Laporan & Cetak PDF</h1>

    @if (session('error'))
        <div class="bg-red-500/20 text-red-300 p-3 mb-6 rounded">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('admin.laporan.form') }}" method="GET" class="space-y-4 mb-8 bg-slate-800 p-6 rounded shadow">

        <div>
            <label class="block mb-1 text-slate-300 font-medium">Jenis Laporan</label>
            <select name="jenis" required class="w-full bg-slate-700 border border-slate-600 rounded p-2 text-white">
                <option value="">-- Pilih Jenis --</option>
                <option value="peminjaman" {{ request('jenis') == 'peminjaman' ? 'selected' : '' }}>Laporan Peminjaman Barang</option>
                <option value="zoom" {{ request('jenis') == 'zoom' ? 'selected' : '' }}>Laporan Permintaan Zoom</option>
            </select>
        </div>

        <div>
            <label class="block mb-1 text-slate-300 font-medium">Bulan</label>
            <select name="bulan" required class="w-full bg-slate-700 border border-slate-600 rounded p-2 text-white">
                <option value="">-- Pilih Bulan --</option>
                @for ($i = 1; $i <= 12; $i++)
                    <option value="{{ sprintf('%02d', $i) }}" {{ request('bulan') == sprintf('%02d', $i) ? 'selected' : '' }}>
                        {{ DateTime::createFromFormat('!m', $i)->format('F') }}
                    </option>
                @endfor
            </select>
        </div>

        <div>
            <label class="block mb-1 text-slate-300 font-medium">Tahun</label>
            <select name="tahun" required class="w-full bg-slate-700 border border-slate-600 rounded p-2 text-white">
                <option value="">-- Pilih Tahun --</option>
                @for ($y = date('Y'); $y >= 2020; $y--)
                    <option value="{{ $y }}" {{ request('tahun') == $y ? 'selected' : '' }}>{{ $y }}</option>
                @endfor
            </select>
        </div>

        <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded font-semibold">
            Tampilkan Data
        </button>

    </form>

    @if (isset($data) && count($data) > 0)

        <div class="mb-4">
            <a href="{{ route('admin.laporan.cetak', ['jenis' => request('jenis'), 'bulan' => request('bulan'), 'tahun' => request('tahun')]) }}"
                target="_blank" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded font-semibold">
                Cetak PDF
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full bg-slate-800 text-slate-100 shadow rounded text-sm">
                <thead class="bg-slate-700 text-left">
                    <tr>
                        <th class="p-3">Nama</th>
                        <th class="p-3">Barang</th>
                        <th class="p-3">Tanggal</th>
                        <th class="p-3">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr class="border-t border-slate-700">
                            <td class="p-3">{{ $item->user->name }}</td>
                            <td class="p-3">{{ $item->barang->nama_barang ?? '-' }}</td>
                            <td class="p-3">
                                @if (request('jenis') == 'peminjaman')
                                    {{ $item->tanggal_pinjam }}
                                @else
                                    {{ $item->tanggal }}
                                @endif
                            </td>
                            <td class="p-3 capitalize">{{ $item->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    @elseif(request()->all())
        <div class="bg-yellow-500/20 text-yellow-300 p-3 rounded mt-4">
            Data tidak ditemukan untuk filter yang dipilih.
        </div>
    @endif

</div>

@endsection
