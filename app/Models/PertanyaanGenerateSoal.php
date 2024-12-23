<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PertanyaanGenerateSoal extends Model
{
    use HasFactory;

    protected $fillable = ['generatesoal_id', 'pertanyaan'];

    public function generatesoal(){
        return $this->belongsTo(GenerateSoal::class, 'generatesoal_id');
    }

    public function jawabangeneratesoal(){
        return $this->hasMany(JawabanGenerateSoal::class, 'pertanyaan_id');
    }
}
