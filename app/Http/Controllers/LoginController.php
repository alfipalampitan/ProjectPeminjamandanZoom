<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function formLogin()
    {
        return view('login');
    }

    public function prosesLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Redirect ke dashboard sesuai role
            if ($user->role === 'admin') {
                return redirect('/dashboard-admin');
            } elseif ($user->role === 'pegawai') {
                return redirect('/dashboard-pegawai');
            } elseif ($user->role === 'pimpinan') {
                return redirect('/dashboard-pimpinan');
            }

            // Default fallback jika role tidak sesuai
            return redirect('/login')->with('error', 'Role tidak dikenali.');
        }

        // Gagal login
        return back()->with('error', 'Email atau password salah.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
