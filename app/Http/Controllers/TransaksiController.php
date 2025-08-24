<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $waliId = auth()->id() ?? session('wali_id');

        // Ambil data santri dari API
        $resp = Http::get('http://127.0.0.1:8001/api/santri');
        $santriList = $resp->successful() ? $resp->json() : [];
        
        // Santri aktif
        $activeChildId = session('current_child') ?? ($santriList[0]['id'] ?? null);
        $child = collect($santriList)->firstWhere('id', $activeChildId);

        // Ambil transaksi
        $query = DB::table('transaksi')
            ->where('santri_id', $child['id'])
            ->orderBy('created_at', 'desc');

        // Filter Jenis
        if ($request->filled('jenis')) {
            $query->where('jenis', 'like',$request->jenis);
        }

        // Filter Periode
        if ($request->periode === 'bulan') {
            $query->whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year);
        } elseif ($request->periode === 'tahun') {
            $query->whereYear('created_at', now()->year);
        } elseif ($request->periode === 'custom') {
            // nanti bisa ditambah form input tanggal mulai & akhir
            // contoh:
            if ($request->filled('start_date') && $request->filled('end_date')) {
                $query->whereBetween('created_at', [$request->start_date, $request->end_date]);
            }
        }

        $riwayat = $query->get();

        return view('alltransaksi', compact('riwayat'));
    }

}
