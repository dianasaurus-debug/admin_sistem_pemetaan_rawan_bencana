<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParameterBanjir extends Model
{
    protected $table = 'parameter_banjir';
    protected $guarded = [];
    use HasFactory;

    public function drainase(){
        return $this->belongsTo(Drainase::class, 'id_drainase', 'id');
    }
    public function curahhujan(){
        return $this->belongsTo(CurahHujan::class, 'id_curahhujan', 'id');
    }
    public function kepadatan_penduduk(){
        return $this->belongsTo(KepadatanPenduduk::class, 'id_kepadatan_penduduk', 'id');
    }

}
