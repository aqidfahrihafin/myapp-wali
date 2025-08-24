<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EnsureWaliSession
{
    /**
     * Handle an incoming request.
     */
     public function handle(Request $request, Closure $next)
    {
        // cek apakah ada session wali
        if (!session()->has('wali')) {
            return redirect()->route('wali.login')->withErrors(['msg' => 'Silakan login terlebih dahulu.']);
        }

        // cek juga apakah ada current_child
        if (!session()->has('current_child')) {
            return redirect()->route('wali.login')->withErrors(['msg' => 'Akun anak tidak ditemukan, silakan login kembali.']);
        }

        return $next($request);
    }
}
