<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Artikel;

class Presensi extends Model
{
    use HasFactory;

    public function artikel()
    {
        // return $this->belongsTo(Artikel::class);
        return $this->hasMany(Artikel::class);
    }

    public function video()
    {
        return $this->hasMany(video_presensi::class);
    }

    public function header(){
        return $this->belongsTo(Header::class);
    }

    protected $casts = [
        'dibuka' => 'integer',
    ];
}
