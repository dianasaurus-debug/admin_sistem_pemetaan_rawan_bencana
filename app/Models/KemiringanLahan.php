<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KemiringanLahan extends Model
{
    protected $table = 'kemiringan_lahan';
    use HasFactory;
    protected $guarded = [];
    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan', 'id');
    }
    public function desa(){
        return $this->belongsTo(Kelurahan::class, 'id_kelurahan', 'id');
    }

}
