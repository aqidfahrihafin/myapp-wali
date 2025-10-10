<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tagihans', function (Blueprint $table) {
            $table->id();
            $table->string('santri_id');
            $table->string('periode_id');
            $table->string('jenis_tagihan_id');
            $table->decimal('jumlah_tagihan', 10, 2);
            $table->date('tanggal_jatuh_tempo');
            $table->text('deskripsi');
            $table->enum('status', ['Lunas', 'Belum Lunas'])->default('Belum Lunas');        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tagihans');
    }
};
