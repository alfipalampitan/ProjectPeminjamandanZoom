@extends('layouts.pegawai')

@section('content')
    <h2 class="text-xl font-bold mb-4">Ajukan Peminjaman Barang</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('peminjaman.store') }}" method="POST">
        @csrf

        <!-- Nama Peminjam -->
        <div class="mb-4">
            <label class="block font-semibold">Nama Peminjam</label>
            <input type="text" name="nama" class="w-full border rounded p-2" required>
        </div>

        <!-- Barang yang Dipinjam -->
        <div class="mb-4">
            <label class="block font-semibold">Barang yang Dipinjam</label>
            <select name="barang_id" class="w-full border rounded p-2" required>
                <option value="">-- Pilih Barang --</option>
                @foreach ($barangs as $barang)
                    <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
                @endforeach
            </select>
        </div>

        <!-- Tanggal Pinjam -->
        <div class="mb-4">
            <label class="block font-semibold">Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam" class="w-full border rounded p-2" required>
        </div>

        <!-- Tanggal Kembali -->
        <div class="mb-4">
            <label class="block font-semibold">Tanggal Kembali</label>
            <input type="date" name="tanggal_kembali" class="w-full border rounded p-2" required>
        </div>

        <!-- Instansi -->
        <div class="mb-4">
            <label class="block font-semibold">Instansi Peminjam</label>
            <select name="instansi_id" class="w-full border rounded p-2" required>
                <option value="">-- Pilih Instansi --</option>
                @foreach ($instansis as $instansi)
                    <option value="{{ $instansi->id }}">{{ $instansi->nama_instansi }}</option>
                @endforeach
            </select>
        </div>

        <!-- No Telepon -->
        <div class="mb-4">
            <label class="block font-semibold">No Telepon</label>
            <input type="number" name="no_telp" class="w-full border rounded p-2" required>
        </div>

        <!-- Keperluan -->
        <div class="mb-4">
            <label class="block font-semibold">Keperluan</label>
            <textarea name="keperluan" rows="4" class="w-full border rounded p-2" required></textarea>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Ajukan Peminjaman</button>
    </form>


@endsection
