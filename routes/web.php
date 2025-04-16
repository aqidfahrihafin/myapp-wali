<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/profile', function () {
    return view('profile');
});
Route::get('/alltransaksi', function () {
    return view('alltransaksi');
});
Route::get('/setting', function () {
    return view('setting');
});
Route::get('/pengaturanprofil', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/edit-profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/edit-profile', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/transaksi/{jenis}', function($jenis) {
    $data = [];

    if ($jenis == 'spp') {
        $data = [
            'judul' => 'Pembayaran SPP',
            'tanggal' => '2025-04-01',
            'jumlah' => 500000,
            'tipe' => 'Keluar',
            'keterangan' => 'Pembayaran SPP bulan April 2025'
        ];
    } elseif ($jenis == 'topup') {
        $data = [
            'judul' => 'Top Up Saldo',
            'tanggal' => '2025-04-02',
            'jumlah' => 700000,
            'tipe' => 'Masuk',
            'keterangan' => 'Top up saldo dari wali santri'
        ];
    } elseif ($jenis == 'tabungan') {
        $data = [
            'judul' => 'Tabungan Santri',
            'tanggal' => '2025-04-03',
            'jumlah' => 150000,
            'tipe' => 'Masuk',
            'keterangan' => 'Menabung untuk keperluan santri'
        ];
    } else {
        abort(404);
    }

    return view('detail-transaksi', ['transaksi' => $data]);
});

Route::get('/cetak-transaksi/{id}', [TransaksiController::class, 'cetak'])->name('cetak.transaksi');
