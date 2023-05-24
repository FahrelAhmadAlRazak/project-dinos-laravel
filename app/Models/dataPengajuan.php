<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataPengajuan extends Model
{
    use HasFactory;

    protected $table = "data_pengajuan";
    protected $primaryKey = "id_pengajuan";
    protected $fillable = [

       
        'id_mitra',
        'tanggal',
        'id_perusahaan_foreign',
        'id_status_pengajuan'
    ];

    

    public function users(){

        return $this->belongsTo(User::class);
    }

    public function dataPerusahaan(){
        return $this->belongsTo(dataPerusahaan::class, 'id_perusahaan_foreign');
    }

    public function dataStatusPengajuan(){
        return $this->belongsTo(dataStatusPengajuan::class, 'id_status_pengajuan');
    }

    public function dataAkunMitra(){
        return $this->belongsTo(dataAkunMitra::class, 'id_mitra');
    }

    public function dataDetailPengajuan(){
        return $this->hasMany(dataDetailPengajuan::class);

    }

    
}