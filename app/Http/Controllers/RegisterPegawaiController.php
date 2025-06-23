<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Instansi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterPegawaiController extends Controller
{

    // public function formRegister()
    // {
        
    // }

    public function create()
    {
        $instansis = Instansi::all(); // ambil semua data instansi
        return view('register-pegawai', compact('instansis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'no_telp' => 'required|string|max:15',
            'instansi_id' => 'required|exists:instansis,id',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'pegawai',
            'no_telp' => $request->no_telp,
            'instansi_id' => $request->instansi_id,
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
    }
}
