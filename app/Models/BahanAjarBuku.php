<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanAjarBuku extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'image', 'deskripsi', // tambahkan semua field yang relevan
    ];
}
