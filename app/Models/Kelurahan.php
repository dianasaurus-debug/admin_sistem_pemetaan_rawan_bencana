<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table = 'kelurahan';
    protected $guarded = [];

    use HasFactory;
    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan', 'id');
    }
    public function riwayat_bencana(){
        return $this->hasMany(RiwayatBencana::class, 'id_kelurahan', 'id');
    }
    public function jarak_sumber(){
        return $this->hasOne(JarakSumberAir::class, 'id_kelurahan', 'id');
    }
    public function kemiringan_lahan(){
        return $this->hasOne(KemiringanLahan::class, 'id_kelurahan', 'id');
    }
    public function kepadatan_penduduk(){
        return $this->hasOne(KepadatanPenduduk::class, 'id_kelurahan', 'id');
    }
}
