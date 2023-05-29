<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pengirimanAdmin()
    {
        return $this->hasMany(PengirimanAdmin::class, 'id_produk', 'id');
    }

    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class, 'id_produk', 'id');
    }

    public function tokoProduk()
    {
        return $this->hasMany(TokoProduk::class, 'id_produk', 'id');
    }

    public function pengirimanToko()
    {
        return $this->hasMany(PengiramanToko::class, 'id_produk', 'id');
    }
}