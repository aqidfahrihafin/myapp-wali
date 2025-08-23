<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $waliId = session('wali_id');

        // if (!$waliId) {
        //     return redirect()->route('wali.login.form')->with('error', 'Silakan login dulu.');
        // }

        // // Ambil riwayat transaksi wali dari tabel transaksi
        // $riwayat = DB::table('transaksi')
        //     ->where('wali_id', $waliId)
        //     ->orderBy('created_at', 'desc')
        //     ->get();

        return view('alltransaksi', compact('riwayat'));
    }
}
