@extends('layouts.admin')

@section('content')

<div class="flex justify-center items-center min-h-[70vh]">

    <div class="w-full max-w-xl bg-slate-800 p-6 rounded-xl shadow-lg space-y-4">
        
        <h2 class="text-2xl font-bold mb-4">Tambah Barang</h2>

        <form action="{{ route('admin.barang.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="nama_barang" class="block font-medium mb-1">Nama Barang</label>
                <input type="text" name="nama_barang" id="nama_barang" required
                    class="w-full border border-slate-600 rounded p-2 bg-slate-700 text-white focus:bg-slate-700 focus:border-blue-500 hover:bg-slate-700">
            </div>

            <div>
                <label for="kategori" class="block font-medium mb-1">Kategori</label>
                <select name="kategori" id="kategori" required
                    class="w-full border border-slate-600 rounded p-2 bg-slate-700 text-white focus:bg-slate-700 hover:bg-slate-700">
                    <option value="umum">Umum</option>
                    <option value="zoom">Zoom</option>
                </select>
            </div>

            <div>
                <label for="jumlah" class="block font-medium mb-1">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah" required
                    class="w-full border border-slate-600 rounded p-2 bg-slate-700 text-white focus:bg-slate-700 focus:border-blue-500 hover:bg-slate-700">
            </div>

            <div>
                <label for="keterangan" class="block font-medium mb-1">Keterangan (Opsional)</label>
                <textarea name="keterangan" id="keterangan" rows="3"
                    class="w-full border border-slate-600 rounded p-2 bg-slate-700 text-white focus:bg-slate-700 hover:bg-slate-700"></textarea>
            </div>

            <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded font-semibold transition">
                Simpan
            </button>
        </form>

    </div>

</div>

@endsection
