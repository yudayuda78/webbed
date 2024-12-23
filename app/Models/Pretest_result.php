<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pretest_result extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'ecourse_id', 'nilai'];

    public function ecourse(){
        return $this->belongsTo(Ecourse::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
