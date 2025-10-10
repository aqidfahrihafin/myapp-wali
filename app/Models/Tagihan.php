<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;
    protected $fillable = [
        'tagihan_id',
        'santri_id',
        'periode_id',
        'jenis_tagihan_id',
        'jumlah_tagihan',
        'tanggal_jatuh_tempo',
        'deskripsi',
        'status',
    ];
}
