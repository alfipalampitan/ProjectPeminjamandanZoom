@extends('layouts.admin')

@section('content')

<div class="max-w-xl mx-auto bg-slate-800 p-8 rounded-xl shadow-lg text-slate-100">

    <h1 class="text-2xl font-bold mb-6 text-center">Edit User</h1>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block mb-1 text-sm font-medium">Nama</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}" required 
                class="w-full p-2 rounded border border-slate-600 bg-slate-700 text-white placeholder-gray-400">
        </div>

        <div>
            <label for="email" class="block mb-1 text-sm font-medium">Email</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}" required 
                class="w-full p-2 rounded border border-slate-600 bg-slate-700 text-white placeholder-gray-400">
        </div>

        <div>
            <label for="role" class="block mb-1 text-sm font-medium">Role</label>
            <select name="role" id="role" required 
                class="w-full p-2 rounded border border-slate-600 bg-slate-700 text-white">
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="pegawai" {{ $user->role === 'pegawai' ? 'selected' : '' }}>Pegawai</option>
                <option value="pimpinan" {{ $user->role === 'pimpinan' ? 'selected' : '' }}>Pimpinan</option>
            </select>
        </div>

        <div>
            <label for="instansi_id" class="block mb-1 text-sm font-medium">Instansi (Opsional)</label>
            <select name="instansi_id" id="instansi_id" 
                class="w-full p-2 rounded border border-slate-600 bg-slate-700 text-white">
                <option value="">-- Pilih Instansi --</option>
                @foreach($instansis as $instansi)
                    <option value="{{ $instansi->id }}" {{ $user->instansi_id == $instansi->id ? 'selected' : '' }}>
                        {{ $instansi->nama_instansi }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="text-center">
            <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded font-semibold">
                Simpan Perubahan
            </button>
        </div>

    </form>
</div>

@endsection
