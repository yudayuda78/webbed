<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formpendaftaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'nama',
        'instansi',
        'profesi',
        'email',
        'whatsapp',
        'provinsi',
        'kota',
        'status',
        'sudahpernah',
        'informasi',
        'sudahshare',
        'sudahgabung',
        'image1',
        'image2',
        'image3',
        'image4',
        'image5'
    ];
}
