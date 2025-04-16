<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;


class TransaksiController extends Controller
{
    public function cetak($id)
    {
        // Data dummy dulu
        $transaksi = [
            'judul' => 'SPP',
            'tanggal' => '2025-04-15',
            'jumlah' => 500000,
            'tipe' => 'Keluar',
            'keterangan' => 'Pembayaran SPP bulan April 2025'
        ];

        // Cetak PDF dari view detail-transaksi-pdf.blade.php
        $pdf = PDF::loadView('detail-transaksi-pdf', compact('transaksi'));
        return $pdf->download('transaksi-'.$transaksi['judul'].'.pdf');
    }
}
