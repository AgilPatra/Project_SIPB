<?php

namespace App\Http\Controllers\AnggotaAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guard:anggota')->except('logout');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::guard('anggota')->attempt($credentials)) {
            // Autentikasi sukses, redirect ke halaman beranda anggota
            return redirect()->intended('/dashboard/anggota');
        }

        // Autentikasi gagal, kembalikan ke halaman login dengan pesan kesalahan
        return back()->withErrors(['email' => 'Email atau kata sandi salah']);
    }
}
