<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataDetailPengajuan extends Model
{
    use HasFactory;

    protected $table = "data_detail_pengajuan";
    protected $primaryKey = "id_detail_pengajuan";
    protected $fillable = [

        'jumlah_produk',
        'id_pengajuan',
        'id_produk',
    ];

    public function dataPengajuan(){
        return $this->belongsTo(dataPengajuan::class, 'id_pengajuan');

    }

    public function dataProduk(){
        return $this->belongsTo(dataProduk::class, 'id_produk');
        
    }
}
