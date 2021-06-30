<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KepadatanPenduduk extends Model
{
    protected $table = 'kepadatan_penduduk';
    protected $guarded = [];
    use HasFactory;
    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan', 'id');
    }
    public function desa(){
        return $this->belongsTo(Kelurahan::class, 'id_kelurahan', 'id');
    }
}
