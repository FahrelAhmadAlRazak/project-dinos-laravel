<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function statusPengajuan(){
        return $this->belongsTo(StatusPengajuan::class, 'id_status_pengajuan', 'id');
    }

    public function perusahaan(){
        return $this->belongsTo(Perusahaan::class, 'id_perusahaan', 'id');
    }

    public function produk(){
        return $this->belongsTo(Produk::class, 'id_produk', 'id');
    }
}
