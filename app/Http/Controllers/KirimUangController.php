<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class KirimUangController extends Controller
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
        // Dummy data
        $totalMasuk  = DB::table('transaksi')->where('santri_id', $child['id'])->where('tipe', 'Masuk')->sum('jumlah');
        $totalKeluar = DB::table('transaksi')->where('santri_id', $child['id'])->where('tipe', 'Keluar')->sum('jumlah');
        $saldo  = $totalMasuk - $totalKeluar;
       $noKk = session('wali.kk'); // ambil no KK dari session wali
        $apiUrl = "http://127.0.0.1:8001/api/santri";

        $response = Http::get($apiUrl);

       if ($response->successful()) {
        $allSantri = $response->json();

        // filter hanya santri yang sesuai KK
        $santriList = collect($allSantri)
            ->where('no_kk', $noKk)
            ->values();

        // ambil ID anak aktif
        $activeChildId = session('current_child') ?? ($santriList[0]['id'] ?? null);

        // tentukan anak aktif
        $child = collect($santriList)->firstWhere('id', $activeChildId);

        // buang anak aktif dari daftar list
        $santriList = $santriList->reject(function ($s) use ($activeChildId) {
            return $s['id'] == $activeChildId;
        })->values()->all();
    } else {
        $santriList = [];
        $child = null;
    }



        // $santriList = [
        //     ['id' => 1, 'nama' => 'Ahmad Fauzi'],
        //     ['id' => 2, 'nama' => 'Fikri Hanif'],
        //     ['id' => 3, 'nama' => 'Salma Zahra'],
        // ];

        return view('kirimuang', compact('saldo', 'santriList'));
    }

    public function store(Request $request)
    {
        $waliId = auth()->id() ?? session('wali_id');

        // Ambil data santri dari API utama
        $resp = Http::get('http://127.0.0.1:8001/api/santri');
        $santriList = $resp->successful() ? $resp->json() : [];

        // Tentukan santri aktif
        $activeChildId = session('current_child') ?? ($santriList[0]['id'] ?? null);
        $child = collect($santriList)->firstWhere('id', $activeChildId);
        $request->validate([
            'santri_id' => 'required',
            'jumlah' => 'required|numeric|min:1000',
        ]);
        // Hitung saldo (masuk - keluar)
        $totalMasuk  = DB::table('transaksi')->where('santri_id', $child['id'])->where('tipe', 'Masuk')->sum('jumlah');
        $totalKeluar = DB::table('transaksi')->where('santri_id', $child['id'])->where('tipe', 'Keluar')->sum('jumlah');
        $totalSaldo  = $totalMasuk - $totalKeluar;
        
        if($request->input('jumlah')>$totalSaldo){
            return redirect()->route('kirimuang.index')->with('error', 'Simulasi: Saldo tidak cukup');
        }
        DB::beginTransaction();
        try{
             DB::table('transaksi')->insert([
            'wali_id'    => null,
            'santri_id'  => $activeChildId, // isi kalau ada id santri
            'jenis'      => 'Kirim',             // contoh: spp / topup / tabungan
            'tipe'       => 'Keluar',           // atau 'Keluar'
            'jumlah'     => $request->input('jumlah'),            // nominal transaksi
            'judul'      => 'Top Up Saldo',    // judul transaksi
            'keterangan' => 'Top up saldo dari wali santri', // deskripsi
            'created_at' => now(),
            'updated_at' => now(),
        ]);
         DB::table('transaksi')->insert([
            'wali_id'    => null,
            'santri_id'  => $request->input('santri_id'), // isi kalau ada id santri
            'jenis'      => 'Terima',             // contoh: spp / topup / tabungan
            'tipe'       => 'Masuk',           // atau 'Keluar'
            'jumlah'     => $request->input('jumlah'),            // nominal transaksi
            'judul'      => 'Top Up Saldo',    // judul transaksi
            'keterangan' => 'Top up saldo dari wali santri', // deskripsi
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->route('kirimuang.index')->with('error', 'Simulasi: Saldo tidak cukup');
        }

        // Simulasikan proses kirim uang
        // Nanti tinggal ganti jadi Http::post() ke API
        return redirect()->route('kirimuang.index')->with('success', 'Simulasi: Uang berhasil dikirim!');
    }
}
