<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $waliId = auth()->id() ?? session('wali_id');

        // Ambil data santri dari API utama
        $resp = Http::get('http://127.0.0.1:8001/api/santri');
        $santriList = $resp->successful() ? $resp->json() : [];

        // Tentukan santri aktif
        $activeChildId = session('current_child') ?? ($santriList[0]['id'] ?? null);
        $child = collect($santriList)->firstWhere('id', $activeChildId);

        // Normalisasi tagihan supaya cocok dengan Blade home
        $tagihanNormalized = collect($child['tagihan'] ?? [])->map(function ($t) use ($child) {
            return [
                'id'           => $t['id'] ?? null,
                'nama_tagihan' => $t['deskripsi'] ?? 'Tagihan',
                'periode'      => $child['periode']['kode_periode'] ?? 'Periode berjalan',
                'jumlah'       => (int)($t['jumlah_tagihan'] ?? 0),
                'status'       => $t['status'] ?? null,
                'jatuh_tempo'  => $t['tanggal_jatuh_tempo'] ?? null,
            ];
        })->all();

        $wali = [
            'nama_wali' => $child['nama_wali'] ?? null,
            'tagihan'   => $tagihanNormalized,
        ];
        $child = [
            'id'   => $child['id'] ?? null,
            'nama' => $child['nama'] ?? null,
        ];

        // Hitung saldo (masuk - keluar)
        $totalMasuk  = DB::table('transaksi')->where('santri_id', $child['id'])->where('tipe', 'Masuk')->sum('jumlah');
        $totalKeluar = DB::table('transaksi')->where('santri_id', $child['id'])->where('tipe', 'Keluar')->sum('jumlah');
        $totalSaldo  = $totalMasuk - $totalKeluar;

        return view('home', compact('wali', 'child', 'totalSaldo'));
    }
}