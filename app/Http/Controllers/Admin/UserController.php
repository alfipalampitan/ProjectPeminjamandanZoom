<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Instansi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('instansi')->get();
        return view('admin.users.index', compact('users'));
    }


    public function create()
    {
        $instansis = Instansi::all(); // Jika menggunakan instansi
        return view('admin.users.create', compact('instansis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'role' => 'required|in:admin,pegawai,pimpinan',
            'instansi_id' => 'nullable|exists:instansis,id', // Jika menggunakan instansi
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'instansi_id' => $request->instansi_id, // Jika menggunakan instansi
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        $instansis = Instansi::all(); // Kalau pakai instansi
        return view('admin.users.edit', compact('user', 'instansis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|in:admin,pegawai,pimpinan',
            'instansi_id' => 'nullable|exists:instansis,id'
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('admin.users.index')->with('success', 'User berhasil diperbarui');
    }


    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return back()->with('success', 'User berhasil dihapus.');
    }
}
