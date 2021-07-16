<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParameterKekeringan extends Model
{
    protected $table = 'parameter_kekeringan';
    protected $guarded = [];
    use HasFactory;

    public function kepadatan_penduduk(){
        return $this->belongsTo(KepadatanPenduduk::class, 'id_kepadatan_penduduk', 'id');
    }
    public function jarak_sumber_air(){
        return $this->belongsTo(JarakSumberAir::class, 'id_jarak', 'id');
    }
}
