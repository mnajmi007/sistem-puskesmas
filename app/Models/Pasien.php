<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = "pasien";
    protected $fillable = [
        "nama",
        "no_rm",
        "tgl_lahir",
        "no_telp",
        "alamat",
    ];
    use HasFactory;
}
