<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthenticatePetugas
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('petugas')->check()) {
            return $next($request);
        }
        return redirect('/login/petugas');
    }

    // protected function authenticate($request, array $guards)
    // {
    //     if ($request->expectsJson()) {
    //         throw new AuthenticationException('Unauthenticated.');
    //     }

    //     if (in_array('petugas', $guards)) {
    //         if (! $this->auth->guard('petugas')->check()) {
    //             return $this->unauthenticated($request, $guards);
    //         }
    //     }
        
    //     return $this->auth->guard($guards)->check();
    // }
}
