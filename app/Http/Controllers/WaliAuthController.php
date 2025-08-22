<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WaliAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login-wali'); 
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required', // ini KK
        ]);

        // Ambil semua santri dari API
        $resp = Http::get('http://127.0.0.1:8001/api/santri');
        if ($resp->failed()) {
            return back()->withErrors(['msg' => 'Gagal menghubungi API santri.']);
        }

        $list = $resp->json();
        if (!is_array($list)) $list = [];

        // Filter: email_wali dan no_kk = input
        $matches = array_values(array_filter($list, function ($s) use ($request) {
            $email = strtolower($s['email_wali'] ?? '');
            $kk    = $s['no_kk'] ?? '';
            return $email === strtolower($request->email) && $kk === $request->password;
        }));

        if (count($matches) === 0) {
            return back()->withErrors(['msg' => 'Email atau KK tidak cocok.']);
        }

        // Anak pertama sebagai default aktif
        $first = $matches[0];

        // Siapkan daftar anak (children)
        $children = array_map(function ($c) {
            return [
                'id'      => $c['id'],
                'nama'    => $c['nama'] ?? '-',
                'no_kk'   => $c['no_kk'] ?? '-',
                'nis'     => $c['nis'] ?? null,
                'image'   => $c['image'] ?? null,
                'kelas'   => data_get($c, 'kamar.nama_kamar'),
                'periode' => data_get($c, 'periode.nama_periode'),
            ];
        }, $matches);

        // Simpan ke session
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
            'current_child' => $first['id'],  // ✅ pakai current_child
        ]);

        return redirect()->route('wali.home');
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('wali.login.form');
    }
}
