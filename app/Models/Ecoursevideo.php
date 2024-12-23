<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ecoursevideo extends Model
{
    use HasFactory;
    public function ecoursetopik()
    {
        return $this->belongsTo(Ecoursetopik::class);
    }
}
