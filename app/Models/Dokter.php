<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = "dokter";
    protected $fillable = ["nama_dokter","no_telp_dokter","id_poli"];
    use HasFactory;
}
