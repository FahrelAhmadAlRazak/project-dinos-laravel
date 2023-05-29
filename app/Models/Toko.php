<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function provinsi(){
        return $this->belongsTo(Provinsi::class, 'id_provinsi', 'id');
    }

    public function kota(){
        return $this->belongsTo(Kota::class, 'id_kota', 'id');
    } 

    public function tokoProduk(){
        return $this->hasMany(TokoProduk::class, 'id_toko', 'id');
    } 

    public function pengirimanToko(){
        return $this->hasMany(PengirimanToko::class, 'id_toko', 'id');
    } 
}