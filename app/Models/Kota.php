<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kota extends Model
{
    use HasFactory;

    protected $table = "kotas";
    protected $primaryKey = "id";
    protected $guarded = ['id'];

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'id_provinsi', 'id');
    }

    public function user(){
        return $this->hasMany(User::class, 'id_kota', 'id');
    } 

    public function kantorAdmin(){
        return $this->hasMany(KantorAdmin::class, 'id_kota', 'id');
    } 

    public function perusahaan(){
        return $this->hasMany(Perusahaan::class, 'id_kota', 'id');
    }
}
