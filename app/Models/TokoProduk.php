<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokoProduk extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function toko(){
        return $this->belongsTo(Toko::class, 'id_toko', 'id');
    } 

    public function produk(){
        return $this->belongsTo(Produk::class, 'id_produk', 'id');
    } 
}