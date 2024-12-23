<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pembicara;

class Event extends Model
{
    use HasFactory;

    public function pembicaras()
    {
        // return $this->belongsTo(Artikel::class);
        return $this->hasMany(Pembicara::class);
    }

    public function categoryevent()
    {
        // return $this->belongsTo(Artikel::class);
        return $this->hasMany(Categoryevent::class);
    }
}
