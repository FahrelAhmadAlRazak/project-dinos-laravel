<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengirimanAdmin extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kantorAdmin()
    {
        return $this->belongsTo(KantorAdmin::class, 'id_kantor_admin', 'id');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id');
    }

    public function statusPengiriman()
    {
        return $this->belongsTo(StatusPengiriman::class, 'id_status_pengiriman', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_kurir', 'id');
    }
}

