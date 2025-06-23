@extends('layouts.pegawai')

@section('content')
<h2 class="text-xl font-bold mb-4">Ajukan Permintaan Fasilitas Zoom</h2>

{{-- Tampilkan Error Validasi --}}
@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Tampilkan Pesan Error Custom --}}
@if (session('error'))
    <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
        {{ session('error') }}
    </div>
@endif

<form action="{{ route('zoom.store') }}" method="POST" class="bg-white p-6 rounded shadow space-y-4">
    @csrf

    {{-- Barang Zoom --}}
    <div>
        <label for="barang_id" class="block font-semibold mb-1">Pilih Barang Zoom</label>
        <select name="barang_id" id="barang_id" class="w-full border p-2 rounded" required>
            <option value="">-- Pilih Barang --</option>
            @foreach ($barangZoom as $barang)
                <option value="{{ $barang->id }}" {{ old('barang_id') == $barang->id ? 'selected' : '' }}>
                    {{ $barang->nama_barang }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Nama Kegiatan --}}
    <div>
        <label for="nama_kegiatan" class="block font-semibold mb-1">Nama Kegiatan</label>
        <input type="text" name="nama_kegiatan" id="nama_kegiatan" class="w-full border p-2 rounded" required
            value="{{ old('nama_kegiatan') }}">
    </div>

    {{-- Instansi --}}
    <div>
        <label for="instansi_id" class="block font-semibold mb-1">Pilih Instansi</label>
        <select name="instansi_id" id="instansi_id" class="w-full border p-2 rounded" required>
            <option value="">-- Pilih Instansi --</option>
            @foreach ($instansis as $instansi)
                <option value="{{ $instansi->id }}" {{ old('instansi_id') == $instansi->id ? 'selected' : '' }}>
                    {{ $instansi->nama_instansi }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Jam Mulai --}}
    <div>
        <label for="jam_mulai" class="block font-semibold mb-1">Jam Mulai</label>
        <input type="time" name="jam_mulai" id="jam_mulai" class="w-full border p-2 rounded" required
            value="{{ old('jam_mulai') }}">
    </div>

    {{-- Jam Selesai --}}
    <div>
        <label for="jam_selesai" class="block font-semibold mb-1">Jam Selesai</label>
        <input type="time" name="jam_selesai" id="jam_selesai" class="w-full border p-2 rounded" required
            value="{{ old('jam_selesai') }}">
    </div>

    {{-- Tanggal --}}
    <div>
        <label for="tanggal" class="block font-semibold mb-1">Tanggal Pemakaian</label>
        <input type="date" name="tanggal" id="tanggal" class="w-full border p-2 rounded" required
            value="{{ old('tanggal') }}">
    </div>

    {{-- Keterangan --}}
    <div>
        <label for="keterangan" class="block font-semibold mb-1">Keterangan</label>
        <textarea name="keterangan" id="keterangan" rows="4" class="w-full border p-2 rounded" required>{{ old('keterangan') }}</textarea>
    </div>

    {{-- Tombol Kirim --}}
    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
        Kirim Permintaan
    </button>
</form>
@endsection
