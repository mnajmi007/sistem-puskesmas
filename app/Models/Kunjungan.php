<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    protected $table="kunjungan";
    protected $fillable = [
        "no_rm",
        "id_poli",
        "status_periksa",
        "status_pasien",
        "tgl_kunjungan"
    ];
    use HasFactory;
}
