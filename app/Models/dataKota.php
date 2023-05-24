<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataKota extends Model
{
    use HasFactory;

    protected $table = "data_kota";
    protected $primaryKey = "id_kota";
    protected $fillable = [

        'nama',
        
        
    ];

    public function dataPerusahaan(){
        return $this->hasMany(dataPerusahaan::class);
    }

    public function dataAkunMitra(){
        return $this->hasMany(dataAkunMitra::class);
    }
}
