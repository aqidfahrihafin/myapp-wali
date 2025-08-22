<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KirimUangController extends Controller
{
    public function index()
    {
        // Dummy data
        $saldo = 500000;

        $santriList = [
            ['id' => 1, 'nama' => 'Ahmad Fauzi'],
            ['id' => 2, 'nama' => 'Fikri Hanif'],
            ['id' => 3, 'nama' => 'Salma Zahra'],
        ];

        return view('kirimuang', compact('saldo', 'santriList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'santri_id' => 'required',
            'jumlah' => 'required|numeric|min:1000',
        ]);

        // Simulasikan proses kirim uang
        // Nanti tinggal ganti jadi Http::post() ke API
        return redirect()->route('kirimuang.index')->with('success', 'Simulasi: Uang berhasil dikirim!');
    }
}
