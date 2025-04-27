<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TagihanController extends Controller
{
    public function show($id)
    {
        // Dummy data dulu, nanti bisa diganti ambil dari API
        $tagihanData = [
            1 => [
                'judul' => 'Pembayaran SPP',
                'icon' => 'bi-cash-stack',
                'nama_santri' => 'Aqid Fahri Hafin',
                'rayon' => 'Rayon A',
                'kamar' => 'Kamar 12',
                'jumlah' => 500000,
            ],
            2 => [
                'judul' => 'Infaq Pesantren',
                'icon' => 'bi-heart-fill',
                'nama_santri' => 'Aqid Fahri Hafin',
                'rayon' => 'Rayon A',
                'kamar' => 'Kamar 12',
                'jumlah' => 50000,
            ],
            3 => [
                'judul' => 'Tagihan Listrik',
                'icon' => 'bi-lightning-fill',
                'nama_santri' => 'Aqid Fahri Hafin',
                'rayon' => 'Rayon A',
                'kamar' => 'Kamar 12',
                'jumlah' => 150000,
            ],
        ];

        $tagihan = $tagihanData[$id] ?? abort(404);

        return view('tagihan.detail', compact('tagihan'));
    }
}
