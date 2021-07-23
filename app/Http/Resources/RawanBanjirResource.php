<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class RawanBanjirResource extends JsonResource
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
            'status' => get_variable_status_banjir($total_curah_hujan/$jumlah_curah_hujan, count($this->riwayat_bencana), (int)$this->kecamatan->drainase->kapasitas_drainase, $this->kepadatan_penduduk->jumlah_penduduk)
        ];
    }
}
