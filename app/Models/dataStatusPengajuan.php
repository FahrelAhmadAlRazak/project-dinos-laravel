<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataStatusPengajuan extends Model
{
    use HasFactory;

    protected $table = "data_status_pengajuan";
    protected $primaryKey = "id_status_pengajuan";
    protected $fillable = [
        'status',

    ];
}