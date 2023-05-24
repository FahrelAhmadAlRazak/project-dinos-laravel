<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Date;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'Andreas Yoga Pratama',
            'username' => 'andreas',
            'email' => 'andreasyoga@gmail.com',
            'password' => bcrypt('andreas123'),
            'no_identitas' => '203410101067',
            'no_telepon' => '082344297648',
            'tanggal_lahir' => '2000-05-14',
            'jalan' => 'jalan burghoven no. 12',
            'id_kota' => '25',
            'id_provinsi' => '12',
            'id_role' => '1',
        ]);

        User::create([
            'nama' => 'Rayyana Shantika',
            'username' => 'rayyana',
            'email' => 'rayyana_sa@gmail.com',
            'password' => bcrypt('rayyana123'),
            'no_identitas' => '201710103044',
            'no_telepon' => '082541807764',
            'tanggal_lahir' => '2002-02-23',
            'jalan' => 'jalan notherham no. 4',
            'id_kota' => 3,
            'id_provinsi' => 2,
            'id_role' => 2,
        ]);

        User::create([
            'nama' => 'Dikta Rajendra Pratama',
            'username' => 'dikta',
            'email' => 'diktarajendra@gmail.com',
            'password' => bcrypt('dikta123'),
            'no_identitas' => '202510104019',
            'no_telepon' => '082214733688',
            'tanggal_lahir' => '1999-11-05',
            'jalan' => 'jalan trivana no. 9',
            'id_kota' => 14,
            'id_provinsi' => 7,
            'id_role' => 3,
        ]);

        
    }
}
