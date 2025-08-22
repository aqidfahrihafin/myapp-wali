<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class ProfileController extends Controller
{
    public function index()
    {
        $activeId = session('santri_aktif_id');

        if (!$activeId) {
            return redirect('/pindah-akun')->with('error', 'Silakan pilih akun santri terlebih dahulu.');
        }

        $apiUrl = "http://127.0.0.1:8001/api/santri/{$activeId}";
        $response = Http::get($apiUrl);

        if ($response->successful()) {
            $santri = $response->json();
        } else {
            $santri = null;
        }

        return view('profile', compact('santri'));
    }
}
