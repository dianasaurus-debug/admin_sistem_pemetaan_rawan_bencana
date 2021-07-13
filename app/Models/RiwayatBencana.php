<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatBencana extends Model
{
    protected $table = 'riwayat_bencana';
    use HasFactory;
    protected $guarded = [];
    public function bencana(){
        return $this->belongsTo(JenisBencana::class, 'id_jenis_bencana', 'id');
    }
    public function desa(){
        return $this->belongsTo(Kelurahan::class, 'id_kelurahan', 'id');
    }
}
