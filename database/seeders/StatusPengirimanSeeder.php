<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\StatusPengiriman;

class StatusPengirimanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StatusPengiriman::create([
            'status' => 'belum dikirim'
        ]);
        
        StatusPengiriman::create([
            'status' => 'sedang dikirim'
        ]);
        
        StatusPengiriman::create([
            'status' => 'sudah dikirim'
        ]);
    }
}
