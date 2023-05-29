<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "users";
    protected $primaryKey = "id";
    protected $guarded = ['id'];

    public function kota(){
        return $this->belongsTo(Kota::class, 'id_kota', 'id');
    }

    public function provinsi(){
        return $this->belongsTo(Provinsi::class, 'id_provinsi', 'id');
    }

    public function role(){
        return $this->belongsTo(Role::class, 'id_role', 'id');
    }

    public function pengajuan(){
        return $this->hasMany(Pengajuan::class, 'id_user', 'id');
    }

    public function pengirimanAdmin()
    {
        return $this->hasMany(PengirimanAdmin::class, 'id_kurir', 'id');
    }

    public function artikel()
    {
        return $this->hasMany(Artikel::class, 'id_author', 'id');
    }

    public function pencatatan(){
        return $this->hasMany(Pencatatan::class, 'id_user', 'id');
    }

    
}
