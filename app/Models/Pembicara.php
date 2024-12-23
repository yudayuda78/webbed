<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembicara extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'pembicara', 'jabatan', 'topik', 'tanggal'];

    public function events(){
        return $this->belongsTo(Event::class);
    }
}
