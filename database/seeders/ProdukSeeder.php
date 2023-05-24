<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produk::create([
            'nama' => 'Keripik Pisang',
            'deskripsi' => 'Keripik untuk semua',
            'harga' => 5000,
            'gambar' => 'assets/gambar/produk1.png',
            'jumlah' => 40
        ]);
        
        Produk::create([
            'nama' => 'Keripik Tempe',
            'deskripsi' => 'Keripik untuk semua',
            'harga' => 7000,
            'gambar' => 'assets/gambar/produk2.png',
            'jumlah' => 34
        ]);

        Produk::create([
            'nama' => 'Keripik Asin',
            'deskripsi' => 'Keripik untuk semua',
            'harga' => 7500,
            'gambar' => 'assets/gambar/produk3.png',
            'jumlah' => 43
        ]);
    }
}