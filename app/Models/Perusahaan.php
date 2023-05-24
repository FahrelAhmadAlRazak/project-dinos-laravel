<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kota(){
        return $this->belongsTo(Kota::class, 'id_kota', 'id');
    }

    public function provinsi(){
        return $this->belongsTo(Provinsi::class, 'id_provinsi', 'id');
    }

    public function pengajuan(){
        return $this->hasMany(Pengajuan::class, 'id_perusahaan', 'id');
    }
}
