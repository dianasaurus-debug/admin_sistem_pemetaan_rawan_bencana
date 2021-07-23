<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
class BencanaBaruResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected $namaBulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'desa' => ucwords(strtolower($this->desa->kel_nama)),
            'kecamatan' => $this->desa->kecamatan->kec_nama,
            'latitude' => $this->bb_latitude,
            'longitude' => $this->bb_longitude,
            'foto_bencana' => $this->bb_foto_bencana,
            'tanggal' => Carbon::parse($this->bb_tanggal)->isoFormat('D MMMM Y'),
        ];
    }
}
