<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPengajuan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    public function pengajuan(){
        return $this->hasMany(Pengajuan::class, 'id_status_pengajuan', 'id');
    }
}
