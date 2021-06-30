<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sop extends Model
{
    protected $table = 'sop';
    use HasFactory;
    protected $guarded = [];
    public function detail_sop(){
        return $this->hasMany(DetailSop::class, 'id_sop');
    }
}
