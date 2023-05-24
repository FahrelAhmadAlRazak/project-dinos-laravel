<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class dataAkunMitra extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = "data_akun_mitras";
    protected $primaryKey = "id_mitra";
    protected $fillable = [
        'nama',
        'username',
        'email',
        'password',
        'jalan',
        'id_kota',
        'id_provinsi',
        'no_telpon',
        'tanggal_lahir',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
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
