<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Wali;

class WaliSeeder extends Seeder
{
    public function run()
    {
        Wali::create([
            'nama' => 'Syamsuri',
            'email' => 'wali@example.com',
            'no_kk' => '30123000982',
            'password' => Hash::make('30123000982'), // Password sama dengan no KK
        ]);
    }
}
