<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class newsertif extends Model
{
    use HasFactory;
    public function header(){
        return $this->belongsTo(Header::class);
    }

    public function Narsumsertif(){
        return $this->hasMany(Narsumsertif::class);
    }
}
