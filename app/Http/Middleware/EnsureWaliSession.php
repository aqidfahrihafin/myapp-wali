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
        // Kalau session wali belum ada → ambil dari API
        if (!session()->has('wali') || !session()->has('current_child')) {
            $resp = Http::get('http://127.0.0.1:8001/api/santri');

            if ($resp->successful()) {
                $santriList = $resp->json();

                if (!empty($santriList)) {
                    $first = $santriList[0]; // anak pertama sebagai default
                    $children = collect($santriList)->map(function ($s) {
                        return [
                            'id'   => $s['id'] ?? null,
                            'nama' => $s['nama'] ?? '-',
                        ];
                    })->toArray();

                    session([
                        'wali' => [
                            'nama'    => $first['nama_wali'] ?? 'Wali',
                            'email'   => $first['email_wali'] ?? '-',
                            'phone'   => $first['no_hp_wali'] ?? '-',
                            'address' => $first['alamat_wali'] ?? '-',
                            'dob'     => $first['tanggal_lahir_wali'] ?? null,
                            'kk'      => $first['no_kk'] ?? '-',
                        ],
                        'children'      => $children,
                        'current_child' => $first['id'] ?? null,
                    ]);
                }
            } else {
                return redirect()->route('wali.login.form')
                    ->with('error', 'Gagal mengambil data wali. Silakan login ulang.');
            }
        }

        return $next($request);
    }
}
