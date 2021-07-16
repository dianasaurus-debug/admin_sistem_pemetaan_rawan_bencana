<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParameterLongsor extends Model
{
    protected $table = 'parameter_longsor';
    use HasFactory;
    protected $guarded = [];
    public function curahhujan(){
        return $this->belongsTo(CurahHujan::class, 'id_curahhujan', 'id');
    }
    public function kemiringan(){
        return $this->belongsTo(KemiringanLahan::class, 'id_kemiringan', 'id');
    }
}
