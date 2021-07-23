<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PutingBeliungResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $curah_hujan = $this->kecamatan->stasiun_hujan->curah_hujan;
        $new_curah_hujan = [];
        $jumlah_curah_hujan = count($curah_hujan);

        for($i=0;$i<count($curah_hujan);$i++){
            array_push($new_curah_hujan, $curah_hujan[$i]->ch_volume);
        }
        $total_curah_hujan = array_sum($new_curah_hujan);

        return [
            'id' => $this->id,
            'desa' => ucwords(strtolower($this->kel_nama)),
            'kecamatan' => $this->kecamatan->kec_nama,
            'latitude' => $this->kel_latitude,
            'longitude' => $this->kel_longitude,
            'status' => get_variable_status_putbel($total_curah_hujan/$jumlah_curah_hujan, count($this->riwayat_bencana))
        ];
    }
}
