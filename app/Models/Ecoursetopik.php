<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ecoursetopik extends Model
{
    use HasFactory;

    public function ecourse()
    {
        return $this->belongsTo(Ecourse::class);
    }

    public function ecoursevideo(){
        return $this->hasMany(Ecoursevideo::class);
    }
}
