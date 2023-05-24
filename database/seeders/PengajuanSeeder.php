<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Pengajuan;

class PengajuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pengajuan::create([
            'id_user' => 1,
            'id_perusahaan' => 2,
            'id_status_pengajuan' => 1,
            'id_produk' => 3,
        ]);

        Pengajuan::create([
            'id_user' => 1,
            'id_perusahaan' => 1,
            'id_status_pengajuan' => 1,
            'id_produk' => 1,
        ]);

        Pengajuan::create([
            'id_user' => 1,
            'id_perusahaan' => 3,
            'id_status_pengajuan' => 1,
            'id_produk' => 2,
        ]);
    }
}
