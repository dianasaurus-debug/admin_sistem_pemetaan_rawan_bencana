<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StasiunHujan extends Model
{
    protected $table = 'stasiun_hujan';
    use HasFactory;
    protected $guarded = [];
    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan', 'id');
    }
    public function curah_hujan(){
        return $this->hasMany(CurahHujan::class, 'id_stasiun', 'id');
    }
}
