<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class video_presensi extends Model
{
    use HasFactory;
    public function presensis()
    {
        // return $this->hasMany(Presensi::class);
        return $this->belongsTo(Presensi::class);
    }
}
