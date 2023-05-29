<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Toko;

class TokoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Toko::create([
            'nama' => 'Toko Sejahtera',
            'jalan' => 'jalan ratu ageng no. 13',
            'id_provinsi' => 11,
            'id_kota' => 19,
        ]);

        Toko::create([
            'nama' => 'Toko Abdi Nusa',
            'jalan' => 'jalan fatmawati no. 4',
            'id_provinsi' => 12,
            'id_kota' => 23,
        ]);

        Toko::create([
            'nama' => 'Toko Rahma',
            'jalan' => 'jalan KH. Agus Salim no. 41',
            'id_provinsi' => 7,
            'id_kota' => 14,
        ]);
    }
}