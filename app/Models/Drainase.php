<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drainase extends Model
{
    protected $table = 'drainase';
    protected $guarded = [];
    use HasFactory;
    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan', 'id');
    }
}
