<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    use HasFactory;

    public function video()
    {
        return $this->hasMany(Presensi::class);
    }

    public function pendaftarandiklat()
    {
        return $this->hasMany(Pendaftarandiklat::class);
    }
}
