<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoryevent extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'category'];

    public function event(){
        return $this->belongsTo(Event::class);
    }
}
