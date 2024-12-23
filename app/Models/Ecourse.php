<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ecourse extends Model
{
    use HasFactory;

    public function quiz(){
        return $this->hasMany(Quiz::class);
    }

    public function quizposttest(){
        return $this->hasMany(Quizposttest::class);
    }

    public function pretest_result(){
        return $this->hasMany(Pretest_result::class);
    }

    public function posttest_result(){
        return $this->hasMany(Posttest_result::class);
    }

    public function Ecoursetopik(){
        return $this->hasMany(Ecoursetopik::class);
    }

    public function Ecoursenarsum(){
        return $this->hasMany(Ecoursenarsum::class);
    }

    public function PembayaranEcourse(){
        return $this->hasMany(PembayaranEcourse::class);
    }
}
