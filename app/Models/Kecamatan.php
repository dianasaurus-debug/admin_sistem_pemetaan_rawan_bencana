<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatan';
    protected $guarded = [];

    use HasFactory;
    public function drainase(){
        return $this->hasMany(DetailSop::class, 'id_kecamatan', 'id');
    }
    public function desa(){
        return $this->hasMany(Kelurahan::class, 'id_kecamatan', 'id');
    }
    public function kepadatan_penduduk(){
        return $this->hasOne(KepadatanPenduduk::class, 'id_kecamatan', 'id');
    }
}
