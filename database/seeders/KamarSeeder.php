<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kamar;

class KamarSeeder extends Seeder
{
    public function run()
    {
        Kamar::create([
            'tipe' => 'VIP',
            'deskripsi' => 'Kamar dengan fasilitas lengkap',
            'harga' => 1000000,
            'jumlah' => 5
        ]);

        Kamar::create([
            'tipe' => 'Reguler',
            'deskripsi' => 'Kamar standar',
            'harga' => 500000,
            'jumlah' => 10
            
        ]);
    }
}