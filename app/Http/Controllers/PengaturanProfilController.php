<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PengaturanProfilController extends Controller
{
    // 🔹 Tampilkan profil wali
    public function index()
    {
        $wali = session('wali');
        if (!$wali) {
            return redirect()->route('wali.login.form')->withErrors(['msg' => 'Silakan login dulu']);
        }

        $currentChildId = session('current_child');
        $children = collect(session('children', []));
        $currentChild = $children->firstWhere('id', $currentChildId);

        // 🔹 Pastikan foto pakai full URL
        $photo = !empty($currentChild['image'])
            ? "http://127.0.0.1:8001/storage/" . $currentChild['image']
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
        $childId = session('current_child');
        if (!$childId) {
            return redirect()->route('wali.login.form')->withErrors(['msg' => 'Silakan login dulu']);
        }

        $response = Http::get("http://127.0.0.1:8001/api/santri/$childId");
        if ($response->failed()) {
            return back()->withErrors(['msg' => 'Gagal ambil data dari API']);
        }

        $santri = $response->json();
        if (isset($santri[0])) {
            $santri = $santri[0];
        }

        $photo = !empty($santri['image'])
            ? "http://127.0.0.1:8001/storage/" . $santri['image']
            : asset('assets/img/bg-img/user1.png');

        $user = [
            'name'    => $santri['nama_wali'] ?? '',
            'email'   => $santri['email_wali'] ?? '',
            'phone'   => $santri['no_hp_wali'] ?? '',
            'address' => $santri['alamat_wali'] ?? '',
            'dob'     => $santri['tanggal_lahir_wali'] ?? '',
            'kk'      => $santri['no_kk'] ?? '',
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
            $response = Http::put("http://127.0.0.1:8001/api/santri/{$childId}", [
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

            // 🔹 Update session wali biar langsung tampil di UI
            session([
                'wali' => [
                    'nama' => $validated['name'],
                    'email' => $validated['email'],
                    'phone' => $validated['phone'],
                    'address' => $validated['address'],
                    'dob' => $validated['dob'],
                    'kk' => $validated['kk'],
                ]
            ]);

            return redirect()->route('pengaturanprofil')->with('success', 'Profil berhasil diperbarui');

        } catch (\Exception $e) {
            return back()->withErrors(['msg' => 'Error: '.$e->getMessage()]);
        }
    }
}
