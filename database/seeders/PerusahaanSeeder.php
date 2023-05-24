<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Perusahaan;

class PerusahaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Perusahaan::create([
            'nama' => 'Perusahaan A',
            'no_izin' => '23554126890',
            'no_telepon' => '083544189765',
            'email' => 'persahaan_a@gmail.com',
            'jalan' => 'jalan watu agung no. 5',
            'id_provinsi' => 12,
            'id_kota' => 57,
        ]);

        Perusahaan::create([
            'nama' => 'Perusahaan B',
            'no_izin' => '23554189890',
            'no_telepon' => '083544279965',
            'email' => 'persahaan_a@gmail.com',
            'jalan' => 'jalan raden no. 41',
            'id_provinsi' => 2,
            'id_kota' => 5,
        ]);

        Perusahaan::create([
            'nama' => 'Perusahaan C',
            'no_izin' => '23565726890',
            'no_telepon' => '083544594465',
            'email' => 'persahaan_a@gmail.com',
            'jalan' => 'jalan adi sucipto no. 12',
            'id_provinsi' => 11,
            'id_kota' => 18,
        ]);
    }
}
