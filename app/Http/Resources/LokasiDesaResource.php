<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LokasiDesaResource extends JsonResource
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
        $bencana_banjir = [];
        $bencana_longsor = [];
        $bencana_putbel = [];
        $bencana_kekeringan = [];
        if(count($this->riwayat_bencana)>0){
            foreach ($this->riwayat_bencana as $bencana){
                switch ($bencana->id_jenis_bencana){
                    case 1 : array_push( $bencana_banjir, $bencana);
                    break;
                    case 2 : array_push( $bencana_longsor, $bencana);
                        break;
                    case 3 : array_push( $bencana_kekeringan, $bencana);
                        break;
                    case 4 : array_push( $bencana_putbel, $bencana);
                        break;
                }
            }
        }
        return [
            'id' => $this->id,
            'desa' => ucwords(strtolower($this->kel_nama)),
            'kecamatan' => $this->kecamatan->kec_nama,
            'latitude' => $this->kel_latitude,
            'longitude' => $this->kel_longitude,
            'status_banjir' => get_variable_status_banjir($total_curah_hujan/$jumlah_curah_hujan, count($bencana_banjir), (int)$this->kecamatan->drainase->kapasitas_drainase, $this->kepadatan_penduduk->jumlah_penduduk),
            'status_longsor' => get_variable_status_longsor($total_curah_hujan/$jumlah_curah_hujan,count($bencana_longsor), $this->kemiringan_lahan->kemiringan_indeks),
            'status_kekeringan' => get_variable_status_kekeringan($this->jarak_sumber->jarak_sumberair, count($bencana_kekeringan), $this->kepadatan_penduduk->jumlah_penduduk),
            'status_putbel' => get_variable_status_putbel($total_curah_hujan/$jumlah_curah_hujan, count($bencana_putbel))
        ];
    }
}
