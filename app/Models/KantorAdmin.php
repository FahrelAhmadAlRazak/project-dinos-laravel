<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KantorAdmin extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    public function user(){
        return $this->belongsTo(User::class, 'id_kota', 'id');
    } 

    public function provinsi(){
        return $this->belongsTo(Provinsi::class, 'id_provinsi', 'id');
    }

    public function kota(){
        return $this->belongsTo(Kota::class, 'id_kota', 'id');
    } 

    public function pengirimanAdmin(){
        return $this->hasMany(PengirimanAdmin::class, 'id_kantor_admin', 'id');
    } 
}
