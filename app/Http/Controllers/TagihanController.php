<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class TagihanController extends Controller
{
    private string $baseUrl = 'http://127.0.0.1:8001/api';

    // === Semua tagihan santri aktif ===
    public function index()
    {
        $activeId = session('current_child');
        $respSantri = Http::get("{$this->baseUrl}/santri");
        $tagihanList = [];

        if ($respSantri->successful()) {
            $santriList = $respSantri->json();
            $child = collect($santriList)->firstWhere('id', $activeId) ?? ($santriList[0] ?? null);

            if ($child && !empty($child['tagihan'])) {
                $tagihanList = collect($child['tagihan'])->map(function ($t) {
                    return [
                        'id'         => $t['id'] ?? null,
                        'nama_jenis' => $t['deskripsi'] ?? 'Tagihan',
                        'deskripsi'  => $t['deskripsi'] ?? null,
                        'nominal'    => (int)($t['jumlah_tagihan'] ?? 0),
                        'created_at' => $t['tanggal_jatuh_tempo'] ?? $t['created_at'] ?? null,
                    ];
                })->all();
            }
        }

        return view('tagihan.alltagihan', compact('tagihanList'));
    }

    // === Detail tagihan ===
    public function show($id)
    {
        if (empty($id)) {
            abort(404, 'ID tagihan tidak valid');
        }

        $activeId = session('current_child');
        $respSantri = Http::get("{$this->baseUrl}/santri");

        if ($respSantri->successful()) {
            $santriList = $respSantri->json();
            $child = collect($santriList)->firstWhere('id', $activeId) ?? ($santriList[0] ?? null);

            $found = collect($child['tagihan'] ?? [])->firstWhere('id', (int)$id);

            if ($found) {
                $tagihan = [
                    'id'         => $found['id'],
                    'nama_jenis' => $found['deskripsi'] ?? 'Tagihan',
                    'deskripsi'  => $found['deskripsi'] ?? null,
                    'nominal'    => (int)($found['jumlah_tagihan'] ?? 0),
                    'created_at' => $found['tanggal_jatuh_tempo'] ?? $found['created_at'] ?? null,
                ];
                return view('tagihan.bayar', compact('tagihan'));
            }
        }

        abort(404, 'Tagihan tidak ditemukan');
    }

    // === Proses bayar ===
    public function prosesBayar($id)
    {
        $waliId = auth()->id() ?? session('wali_id');
        $activeId = session('current_child');

        $respSantri = Http::get("{$this->baseUrl}/santri");
        if (!$respSantri->successful()) {
            return back()->with('error', 'Gagal ambil data santri.');
        }

        $santriList = $respSantri->json();
        $child = collect($santriList)->firstWhere('id', $activeId) ?? ($santriList[0] ?? null);
        $found = collect($child['tagihan'] ?? [])->firstWhere('id', (int)$id);

        if (!$found) {
            return back()->with('error', 'Tagihan tidak ditemukan.');
        }

        $grossAmount = (int)($found['jumlah_tagihan'] ?? 0);
        if ($grossAmount <= 0) {
            return back()->with('error', 'Nominal tagihan tidak valid.');
        }

        $saldo = $this->hitungSaldo($waliId);
        if ($saldo < $grossAmount) {
            return back()->with('error', 'Saldo tidak cukup. Silakan top up terlebih dahulu.');
        }

        $this->catatTransaksi($waliId, [
            'santri_id'  => $child['id'] ?? null,
            'jenis'      => 'spp',
            'tipe'       => 'Keluar',
            'jumlah'     => $grossAmount,
            'judul'      => $found['deskripsi'] ?? 'Pembayaran Tagihan',
            'keterangan' => 'Pembayaran tagihan #' . $id,
        ]);

        return redirect()->route('tagihan.detail', $id)
            ->with('success', 'Tagihan berhasil dibayar memakai saldo.');
    }

    // === Helper ===
    private function hitungSaldo($waliId): int
    {
        $totalMasuk  = DB::table('transaksi')->where('wali_id', $waliId)->where('tipe', 'Masuk')->sum('jumlah');
        $totalKeluar = DB::table('transaksi')->where('wali_id', $waliId)->where('tipe', 'Keluar')->sum('jumlah');
        return (int) $totalMasuk - (int) $totalKeluar;
    }

    private function catatTransaksi($waliId, array $data): void
    {
        DB::table('transaksi')->insert([
            'wali_id'    => $waliId,
            'santri_id'  => $data['santri_id'] ?? null,
            'jenis'      => $data['jenis'] ?? null,
            'tipe'       => $data['tipe'] ?? 'Keluar',
            'jumlah'     => (int)($data['jumlah'] ?? 0),
            'judul'      => $data['judul'] ?? null,
            'keterangan' => $data['keterangan'] ?? null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
