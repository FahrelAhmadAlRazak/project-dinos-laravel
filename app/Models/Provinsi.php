<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;

    protected $table = "provinsis";
    protected $primaryKey = "id";
    protected $guarded = ['id'];

    public function kota(){
        return $this->hasMany(Kota::class, 'id_provinsi','id');
    }

    public function user(){
        return $this->hasMany(Kota::class, 'id_provinsi', 'id');
    } 

    public function kantorAdmin(){
        return $this->hasMany(KantorAdmin::class, 'id_provinsi', 'id');
    } 

    public function perusahaan(){
        return $this->hasMany(Perusahaan::class, 'id_kota', 'id');
    }
}
