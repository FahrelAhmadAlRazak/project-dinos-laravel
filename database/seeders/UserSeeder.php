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
            'nama' => 'Riyatnandar Wahyu',
            'username' => 'wahyu',
            'email' => 'wahyu@gmail.com',
            'password' => bcrypt('wahyu123'),
            'no_identitas' => '212410101097',
            'no_telepon' => '082344297648',
            'tanggal_lahir' => '2000-05-14',
            'jalan' => 'jalan burghoven no. 12',
            'id_kota' => '25',
            'id_provinsi' => '12',
            'id_role' => '1',
        ]);

        User::create([
            'nama' => 'Novel Kinandana',
            'username' => 'Novel',
            'email' => 'novel@gmail.com',
            'password' => bcrypt('novel123'),
            'no_identitas' => '212410101044',
            'no_telepon' => '082541807764',
            'tanggal_lahir' => '2002-02-23',
            'jalan' => 'jalan notherham no. 4',
            'id_kota' => 3,
            'id_provinsi' => 2,
            'id_role' => 2,
        ]);

        User::create([
            'nama' => 'Fahrel Ahmad Al Razak',
            'username' => 'Fahrel',
            'email' => 'fahrelrazak@gmail.com',
            'password' => bcrypt('fahrel123'),
            'no_identitas' => '212410101097',
            'no_telepon' => '082214733688',
            'tanggal_lahir' => '1999-11-05',
            'jalan' => 'jalan trivana no. 9',
            'id_kota' => 14,
            'id_provinsi' => 7,
            'id_role' => 3,
        ]);

        
    }
}
