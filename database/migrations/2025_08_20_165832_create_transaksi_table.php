<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wali_id')->nullable();
            $table->unsignedBigInteger('santri_id')->nullable();
            $table->string('jenis')->nullable();      // spp, topup, tabungan, dll
            $table->string('tipe')->nullable();       // Masuk / Keluar
            $table->bigInteger('jumlah')->default(0); // nominal
            $table->string('judul')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
