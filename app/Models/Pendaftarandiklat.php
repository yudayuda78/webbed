<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftarandiklat extends Model
{
    use HasFactory;
    public function header(){
        return $this->belongsTo(Header::class);
    }
}
