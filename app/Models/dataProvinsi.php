<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataProvinsi extends Model
{
    use HasFactory;

    protected $table = "data_provinsi";
    protected $primaryKey = "id_provinsi";
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
