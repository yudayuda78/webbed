<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Narsumsertif extends Model
{
    use HasFactory;

    public function newsertif(){
        return $this->belongsTo(newsertif::class, 'newsertif_id');
    }
}
