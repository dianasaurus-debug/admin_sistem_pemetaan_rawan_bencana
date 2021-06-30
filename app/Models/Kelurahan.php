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
    public function kepadatan_penduduk(){
        return $this->hasOne(KepadatanPenduduk::class, 'id_kecamatan', 'id');
    }
}
