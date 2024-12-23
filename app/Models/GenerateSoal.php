<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenerateSoal extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'description', 'slug', 'user_id'];

    public function pertanyaangeneratesoals(){
        return $this->hasMany(PertanyaanGenerateSoal::class, 'generatesoal_id');
    }
}
