<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    // Di model Artikel
    protected $fillable = ['id', 'judul_artikel', 'link'];


    public function presensis()
    {
        // return $this->hasMany(Presensi::class);
        return $this->belongsTo(Presensi::class);
    }

}
