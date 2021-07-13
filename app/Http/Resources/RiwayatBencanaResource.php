<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RiwayatBencanaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected $namaBulan = array("Januari","Februaru","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'desa' => ucwords(strtolower($this->desa->kel_nama)),
            'kecamatan' => $this->desa->kecamatan->kec_nama,
            'latitude' => $this->rb_latitude,
            'longitude' => $this->rb_longitude,
            'kerusakan' => $this->rb_kerusakan,
            'kerugian' => "{$this->rb_kerugian} Juta",
            'status_perbaikan' => $this->rb_status_perbaikan,
            'bulan' => $this->namaBulan[(int) $this->rb_bulan-1],
            'tahun' => $this->rb_tahun,
        ];
    }
}
