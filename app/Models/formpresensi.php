<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formpresensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'nama',
        'instansi',
        'posisi',
        'email',
        'whatsapp',
        'provinsi',
        'kota',
    ];
}
