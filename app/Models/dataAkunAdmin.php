<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class dataAkunAdmin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

   
    protected $table = "data_akun_admins";
    protected $primaryKey = "id_admin";
    protected $fillable = [
        'nama',
        'username',
        'email',
        'password',
        'nomor_identitas',
        'jalan',
        'id_kota',
        'id_provinsi',
        'no_telpon',
        'tanggal_lahir',
    ];

   
    protected $hidden = [
        'password',
        'remember_token',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function dataKota(){
        return $this->belongsTo(dataKota::class, 'id_kota');
    }

    public function dataProvinsi(){
        return $this->belongsTo(dataProvinsi::class, 'id_provinsi');
    }

    public function dataPengajuan(){
        return $this->hasMany(dataPengajuan::class);

    }
}
