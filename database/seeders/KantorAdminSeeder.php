<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\KantorAdmin;

class KantorAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KantorAdmin::create([
            'nama' => 'Kantor Jember',
            'jalan' => 'jalan Sumatra no 5',
            'id_kota' => 36,
            'id_provinsi' => 12,
        ]);

        KantorAdmin::create([
            'nama' => 'Kantor Bantul',
            'jalan' => 'jalan Semawa no 11',
            'id_kota' => 16,
            'id_provinsi' => 11,
        ]);

        KantorAdmin::create([
            'nama' => 'Kantor Badung',
            'jalan' => 'jalan Manggala no 12',
            'id_kota' => 1,
            'id_provinsi' => 2,
        ]);

        KantorAdmin::create([
            'nama' => 'Kantor Jakarta Pusat',
            'jalan' => 'jalan Rawa Agung no 32',
            'id_kota' => 11,
            'id_provinsi' => 7,
        ]);
    }
}
