<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JarakSumberAir extends Model
{
    protected $table = 'jarak_sumber_air';
    protected $guarded = [];
    use HasFactory;
    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan', 'id');
    }
    public function desa(){
        return $this->belongsTo(Kelurahan::class, 'id_kelurahan', 'id');
    }
}
