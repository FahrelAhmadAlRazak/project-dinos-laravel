<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengirimanToko extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Toko(){
        return $this->belongsTo(Toko::class, 'id_toko', 'id');
    } 

    public function produk(){
        return $this->belongsTo(Produk::class, 'id_produk', 'id');
    } 

    public function user(){
        return $this->belongsTo(User::class, 'id_kurir', 'id');
    } 

    public function statusPengiriman(){
        return $this->belongsTo(StatusPengiriman::class, 'id_status_pengiriman', 'id');
    } 
}