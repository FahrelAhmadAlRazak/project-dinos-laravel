<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataPerusahaan extends Model
{
    use HasFactory;

    protected $table = "data_perusahaan";
    protected $primaryKey = "id_perusahaan";
    protected $fillable = [
        
        'nama_perusahaan',
        'nomer_izin_usaha',
        'notelp_perusahaan',
        'email_perusahaan',
        'jalan',
        'id_kota',
        'id_provinsi',
        
    ];

    public function dataKota(){
        return $this->belongsTo(dataKota::class, 'id_kota');
    }

    public function dataProvinsi(){
        return $this->belongsTo(dataProvinsi::class, 'id_provinsi');
    }

    public function dataPengajuan(){
        return $this->hasMany(dataPengajuan::class,);
    }

    
}
