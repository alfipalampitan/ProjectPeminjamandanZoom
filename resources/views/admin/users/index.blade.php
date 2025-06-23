@extends('layouts.admin')

@section('content')

<div class="p-4">

    <h1 class="text-2xl font-bold mb-6 text-slate-100">Kelola User</h1>

    @if (session('success'))
        <div class="bg-green-500/20 text-green-300 p-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-between items-center mb-4">
        <a href="{{ route('admin.users.create') }}" 
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded font-medium">
            + Tambah User
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-slate-100 bg-slate-800 rounded shadow">
            <thead class="bg-slate-700 text-left">
                <tr>
                    <th class="p-3">Nama</th>
                    <th class="p-3">Email</th>
                    <th class="p-3">Role</th>
                    <th class="p-3">Instansi</th>
                    <th class="p-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="border-t border-slate-700">
                        <td class="p-3">{{ $user->name }}</td>
                        <td class="p-3">{{ $user->email }}</td>
                        <td class="p-3 capitalize">{{ $user->role }}</td>
                        <td class="p-3">{{ $user->instansi->nama_instansi ?? '-' }}</td>
                        <td class="p-3 flex space-x-2">
                            <a href="{{ route('admin.users.edit', $user->id) }}" 
                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm">
                                Edit
                            </a>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" 
                                onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection
