<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KekeringanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'desa' => ucwords(strtolower($this->kel_nama)),
            'kecamatan' => $this->kecamatan->kec_nama,
            'latitude' => $this->kel_latitude,
            'longitude' => $this->kel_longitude,
            'status' => get_variable_status_kekeringan($this->jarak_sumber->jarak_sumberair, count($this->riwayat_bencana), $this->kepadatan_penduduk->jumlah_penduduk)
        ];
    }
}
