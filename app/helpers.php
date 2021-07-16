<?php
use Illuminate\Support\Facades\Config;
if (!function_exists('get_status_banjir'))
{
    function get_variable_status_banjir($curahhujan, $riwayat_bencana, $kapasitas_drainase, $kepadatan_penduduk){
        // rendah = 0
        // sedang = 1
        // tinggi = 2
        $status_curahhujan = 0;
        $status_bencana = 0;
        $status_drainase = 0;
        $status_penduduk = 0;
        if($curahhujan>100&&$curahhujan<=200){
            $status_curahhujan = 1;
        }
        else if($curahhujan<=100){
            $status_curahhujan = 0;
        }
        else if($curahhujan>200){
            $status_curahhujan = 2;
        }
        if($riwayat_bencana==1){
            $status_bencana = 1;
        }
        else if($riwayat_bencana==0){
            $status_bencana = 0;
        }
        else if($riwayat_bencana>2){
            $status_bencana = 2;
        }
        if($kapasitas_drainase>=5000&&$kapasitas_drainase<=6399){
            $status_drainase = 1;
        }
        else if($kapasitas_drainase<5000){
            $status_drainase = 0;
        }
        else if($kapasitas_drainase>6399){
            $status_drainase = 2;
        }
        if($kepadatan_penduduk>=20200&&$kepadatan_penduduk<=40349){
            $status_drainase = 1;
        }
        else if($kepadatan_penduduk<50&&$kepadatan_penduduk>=20200){
            $status_drainase = 0;
        }
        else if($kepadatan_penduduk>40350){
            $status_drainase = 2;
        }
        return [
          'curah_hujan' => $status_curahhujan,
          'riwayat_bencana_banjir' => $status_bencana,
            'kepadatan_penduduk' => $status_penduduk,
            'kapasitas_drainase' => $status_drainase
        ];
    }
}

