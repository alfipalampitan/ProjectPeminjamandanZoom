@extends('layouts.admin')

@section('content')

<div class="max-w-xl mx-auto bg-slate-800 p-8 rounded-xl shadow-lg text-slate-100">

    <h1 class="text-2xl font-bold mb-6 text-center">Tambah User Baru</h1>

    <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-5">
        @csrf

        <div>
            <label for="name" class="block mb-1 text-sm font-medium">Nama</label>
            <input type="text" name="name" id="name" required placeholder="Nama lengkap" 
                class="w-full p-2 rounded border border-slate-600 bg-slate-700 text-white placeholder-gray-400">
        </div>

        <div>
            <label for="email" class="block mb-1 text-sm font-medium">Email</label>
            <input type="email" name="email" id="email" required placeholder="Email aktif" 
                class="w-full p-2 rounded border border-slate-600 bg-slate-700 text-white placeholder-gray-400">
        </div>

        <div>
            <label for="instansi_id" class="block mb-1 text-sm font-medium">Instansi (Opsional)</label>
            <select name="instansi_id" id="instansi_id" 
                class="w-full p-2 rounded border border-slate-600 bg-slate-700 text-white">
                <option value="">-- Pilih Instansi --</option>
                @foreach($instansis as $instansi)
                    <option value="{{ $instansi->id }}">{{ $instansi->nama_instansi }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="role" class="block mb-1 text-sm font-medium">Role</label>
            <select name="role" id="role" required 
                class="w-full p-2 rounded border border-slate-600 bg-slate-700 text-white">
                <option value="">-- Pilih Role --</option>
                <option value="admin">Admin</option>
                <option value="pegawai">Pegawai</option>
                <option value="pimpinan">Pimpinan</option>
            </select>
        </div>

        <div>
            <label for="password" class="block mb-1 text-sm font-medium">Password</label>
            <input type="password" name="password" id="password" required placeholder="Minimal 6 karakter" 
                class="w-full p-2 rounded border border-slate-600 bg-slate-700 text-white placeholder-gray-400">
        </div>

        <div class="text-center">
            <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded font-semibold">
                Simpan
            </button>
        </div>
    </form>

</div>

@endsection
