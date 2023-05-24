<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPengiriman extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pengirimanAdmin()
    {
        return $this->hasMany(PengirimanAdmin::class, 'id_status_pengiriman', 'id');
    }
}
