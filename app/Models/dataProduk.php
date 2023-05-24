<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataProduk extends Model
{
    protected $table = "data_produk";
    protected $primaryKey = "id_produk";
    protected $fillable = [
        'nama_produk',
        'harga_produk',
        'deskripsi_produk',
        'gambar_produk',

    ];

    public function dataDetailPengajuan(){
        return $this->hasMany(dataDetailPengajuan::class);
    }
}
