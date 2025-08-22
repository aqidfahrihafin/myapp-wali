<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenarikanController extends Controller
{
    public function index()
    {
        // DATA DUMMY SEMENTARA
        $saldo = 250000; // Misalnya: Rp. 250.000

        return view('penarikan.index', compact('saldo'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jumlah' => 'required|numeric|min:1',
        ]);

        $saldoSaatIni = 250000;

        if ($request->jumlah > $saldoSaatIni) {
            return back()->withErrors(['msg' => 'Jumlah melebihi saldo yang tersedia.'])->withInput();
        }

        // Simulasi sukses tarik uang
        return redirect()->route('tarik.index')->with('success', 'Penarikan sebesar Rp. ' . number_format($request->jumlah, 0, ',', '.') . ' berhasil!');
    }
}
