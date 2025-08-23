<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PindahAkunController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\TopupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KirimUangController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\PengaturanProfilController;
use App\Http\Controllers\WaliAuthController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PenarikanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// === AUTH ===
Route::get('/login-wali', [WaliAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login-wali', [WaliAuthController::class, 'login'])->name('wali.login');
Route::get('/logout-wali', [WaliAuthController::class, 'logout'])->name('wali.logout');

Route::middleware('wali.session')->group(function () {
    // === HOME ===
Route::get('/', [HomeController::class, 'index'])->name('wali.home');


// === PROFILE SANTRI ===
Route::get('/profile', [SantriController::class, 'profile'])->name('profile');

// === SETTING & MENU STATIS ===
Route::get('/setting', [SettingController::class, 'index'])->name('setting');
Route::get('/pengaturan-akun', fn() => view('pengaturanakun'));
Route::get('/edit-akun', fn() => view('editakun'));

// === PENGATURAN PROFIL WALI ===
Route::get('/pengaturanprofil', [PengaturanProfilController::class, 'index'])->name('pengaturanprofil');
Route::get('/edit-profile', [PengaturanProfilController::class, 'edit'])->name('profile.edit');
Route::post('/edit-profile', [PengaturanProfilController::class, 'update'])->name('profile.update');

// === TRANSAKSI ===
// Route::get('/alltransaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
// Route::get('/transaksi/{id}', [TransaksiController::class, 'show'])->name('transaksi.show');
// Route::get('/cetak-transaksi/{id}', [TransaksiController::class, 'cetak'])->name('cetak.transaksi');
Route::get('/alltransaksi', function () {
    return view('alltransaksi');
});

// === TAGIHAN ===
Route::get('/tagihan', [TagihanController::class, 'index'])->name('tagihan.index'); // semua tagihan
Route::get('/tagihan/{id}', [TagihanController::class, 'show'])->name('tagihan.detail'); // detail tagihan
Route::post('/tagihan/{id}/bayar', [TagihanController::class, 'prosesBayar'])->name('tagihan.prosesBayar'); // proses bayar

// TOPUP
Route::get('/topup', [TopupController::class, 'form'])->name('topup.form');
Route::post('/topup/process', [TopupController::class, 'process'])->name('topup.process');
Route::get('/topup/choose/{orderId}/{amount}', [TopupController::class, 'chooseMethod'])->name('topup.chooseMethod');
Route::post('/topup/submit', [TopupController::class, 'submitMethod'])->name('topup.submitMethod');
Route::get('/topup/submit/{id}/{method}', [TopupController::class, 'detailtopup'])->name('topup.detail');
Route::get('/topup/status/{orderId}', [TopupController::class, 'checkStatus'])->name('topup.status');


// === TARIK ===
Route::get('/tarik', [PenarikanController::class, 'index'])->name('tarik.index');
Route::post('/tarik', [PenarikanController::class, 'store'])->name('tarik.store');

// === KIRIM UANG ===
Route::get('/kirimuang', [KirimUangController::class, 'index'])->name('kirimuang.index');
Route::post('/kirimuang', [KirimUangController::class, 'store'])->name('kirimuang.store');

// === PINDAH AKUN ===
Route::get('/pindah-akun', [PindahAkunController::class, 'index'])->name('pindah-akun');
Route::post('/pindah-akun/switch', [PindahAkunController::class, 'switch'])->name('pindah-akun.switch');

// === SANTRI ===
Route::get('/santri', [SantriController::class, 'index']);

});

// MIDTRANS CALLBACK (harus PUBLIC, POST)
Route::post('/midtrans/callback', [TopupController::class, 'callback'])->name('midtrans.callback');
