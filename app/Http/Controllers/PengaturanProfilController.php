<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class PengaturanProfilController extends Controller
{
    // 🔹 Tampilkan profil wali
    public function index()
    {
        $wali = session('wali');
        if (!$wali) {
            return redirect()->route('login')->withErrors(['msg' => 'Silakan login dulu']);
        }

        $currentChildId = session('current_child');
        $children = collect(session('children', []));
        $currentChild = $children->firstWhere('id', $currentChildId);

        // 🔹 Pastikan foto pakai full URL
        $photo = !empty($wali['image_wali'])
            ? "http://127.0.0.1:8001/storage/" . $wali['image_wali']
            : asset('assets/img/bg-img/user1.png');

        $user = (object) [
            'name'    => $wali['nama'] ?? '-',
            'email'   => $wali['email'] ?? '-',
            'phone'   => $wali['phone'] ?? '-',
            'address' => $wali['address'] ?? '-',
            'dob'     => $wali['dob'] ?? null,
            'kk'      => $wali['kk'] ?? '-',
            'photo'   => $photo,
        ];

        return view('pengaturanprofil', compact('user'));
    }

    // 🔹 Tampilkan form edit profil wali
    public function edit()
    {
        $wali = session('wali');
        if (!$wali) {
            return redirect()->route('login')->withErrors(['msg' => 'Silakan login dulu']);
        }

        $photo = !empty($wali['image_wali'])
            ? "http://127.0.0.1:8001/storage/" . $wali['image_wali']
            : asset('assets/img/bg-img/user1.png');

        $user = [
            'name'    => $wali['nama'] ?? '',
            'email'   => $wali['email'] ?? '',
            'phone'   => $wali['phone'] ?? '',
            'address' => $wali['address'] ?? '',
            'dob'     => $wali['dob'] ?? '',
            'kk'      => $wali['kk'] ?? '',
            'photo'   => $photo,
        ];

        return view('edit-profile', compact('user'));
    }

    // 🔹 Update profil wali
    public function update(Request $request)
    {
        $wali = session('wali');
        $childId = session('current_child');

        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'dob' => 'required|date',
            'kk' => 'required|string|max:20',
            
        ]);

        try {
            // 🔹 Simpan ke sistem utama (myapp) lewat API
            $response = Http::put("http://127.0.0.1:8001/api/update/santri/{$childId}", [
                'nama_wali' => $validated['name'],
                'email_wali' => $validated['email'],
                'no_hp_wali' => $validated['phone'],
                'alamat_wali' => $validated['address'],
                'tanggal_lahir_wali' => $validated['dob'],
                'no_kk' => $validated['kk'],
            ]);

            if ($response->failed()) {
                return back()->withErrors(['msg' => 'Gagal update profil ke server utama']);
            }

             // Ambil semua santri dari API
        $resp = Http::get('http://127.0.0.1:8001/api/santri');
        if ($resp->failed()) {
            return back()->withErrors(['msg' => 'Gagal menghubungi API santri.']);
        }

        $list = $resp->json();
        if (!is_array($list)) $list = [];

        // Filter: email_wali dan no_kk = input
        $matches = array_values(array_filter($list, function ($s) use ($validated,$wali) {
            $email = strtolower($s['email_wali'] ?? '');
            $kk    = $s['password'] ?? '';
            return $email === strtolower($validated['email']) && Hash::check(  $wali['password'],$kk);
            
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
                'image_wali'=>$first['image_wali'] ?? '-',
            ],
            'children'      => $children,
            'current_child' => $first['id'],  // ✅ pakai current_child
        ]);


            return redirect()->route('pengaturanprofil')->with('success', 'Profil berhasil diperbarui');

        } catch (\Exception $e) {
            return back()->withErrors(['msg' => 'Error: '.$e->getMessage()]);
        }
    }
}
