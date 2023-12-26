<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // return $request->expectsJson() ? null : route('login');
        if ($request->expectsJson()) {
            return null;
        }
    
        if ($request->is('petugas/*')) {
            return route('petugas.login'); // Ganti dengan nama rute yang sesuai untuk "Petugas"
        } elseif ($request->is('anggota/*')) {
            return route('anggota.login'); // Ganti dengan nama rute yang sesuai untuk "Anggota"
        } else {
            return route('login'); // Rute default jika tidak ada rute yang sesuai
        }
    }
}
