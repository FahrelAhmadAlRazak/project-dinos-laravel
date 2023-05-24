<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\StatusPengajuan;

class StatusPengajuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StatusPengajuan::create([
            'status' => 'belum disetujui'
        ]);
        
        StatusPengajuan::create([
            'status' => 'disetujui'
        ]);
        
        StatusPengajuan::create([
            'status' => 'ditolak'
        ]);
    }
}
