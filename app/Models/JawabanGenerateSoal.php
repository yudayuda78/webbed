<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanGenerateSoal extends Model
{
    use HasFactory;

    protected $fillable = ['pertanyaan_id', 'jawaban', 'is_correct'];

    public function pertanyaangeneratesoal(){
        return $this->belongsTo(PertanyaanGenerateSoal::class, 'pertanyaan_id');
    }
}
