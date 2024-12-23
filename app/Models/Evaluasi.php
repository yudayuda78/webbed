<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluasi extends Model
{
    use HasFactory;

    public function formEvaluasi()
    {
        return $this->hasMany(FormEvaluasi::class, 'judul', 'judul');
    }
}
