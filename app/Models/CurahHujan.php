<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurahHujan extends Model
{
    protected $table = 'curah_hujan';
    use HasFactory;
    protected $guarded = [];
    public function stasiun(){
        return $this->belongsTo(StasiunHujan::class, 'id_stasiun', 'id');
    }
}
