<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PindahAkunController extends Controller
{
    // 🔹 Daftar anak berdasarkan no_kk wali
    public function index()
    {
        $noKk = session('wali.kk'); // ambil no KK dari session wali
        $apiUrl = "http://127.0.0.1:8001/api/santri";

        $response = Http::get($apiUrl);

        if ($response->successful()) {
            $allSantri = $response->json();
            // filter hanya santri yang sesuai KK
            $santriList = collect($allSantri)->where('no_kk', $noKk)->values()->all();
        } else {
            $santriList = [];
        }

        return view('pindah-akun', compact('santriList'));
    }

    // 🔹 Simpan pilihan anak ke session
   public function switch(Request $request)
    {
        $id = $request->input('santri_id');

        // simpan id ke session
        session(['current_child' => $id]);

        // ambil data santri terbaru dari API
        $apiUrl   = "http://127.0.0.1:8001/api/santri/{$id}";
        $response = Http::get($apiUrl);

        if ($response->successful()) {
            $santri = $response->json();
            if (isset($santri[0])) {
                $santri = $santri[0];
            }

            // simpan juga ke session agar home bisa pakai data fresh
            session()->put("child_data_{$id}", $santri);
        }

        return redirect()->route('wali.home')->with('success', 'Akun berhasil diganti!');
    }



}
