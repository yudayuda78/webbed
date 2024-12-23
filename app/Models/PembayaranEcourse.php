<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranEcourse extends Model
{
    use HasFactory;

    

    protected $fillable = [
        'user_id',
        'ecourse_id',
        'nama',
        'email',
        'nomerwa',
        'bank',
        'ecourse_judul',
        'harga',
        'gambar',
        'status',
    ];

    public function ecourse(){
        return $this->belongsTo(Ecourse::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
