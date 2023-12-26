<?php

namespace App\Http\Controllers\PetugasAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:petugas')->except('logout');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::guard('petugas')->attempt($credentials)) {
            // Autentikasi sukses, redirect ke halaman beranda Petugas
            return redirect()->intended('/dashboard/petugas');
        }

        // Autentikasi gagal, kembalikan ke halaman login dengan pesan kesalahan
        return back()->withErrors(['email' => 'Email atau kata sandi salah']);
    }
}
