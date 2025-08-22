<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SantriController extends Controller
{
    // Tampilkan profil santri aktif
    public function profile()
    {
        $activeId = session('current_child');

        if (!$activeId) {
            return redirect('/setting')->with('error', 'Belum memilih akun santri.');
        }

        $apiUrl = "http://127.0.0.1:8001/api/santri/{$activeId}";
        $response = Http::get($apiUrl);

        if ($response->successful()) {
            $santri = $response->json();

            if (isset($santri[0])) {
                $santri = $santri[0];
            }
        } else {
            $santri = null;
        }

        return view('profile', compact('santri'));
    }
}
