<?php
use Illuminate\Support\Facades\Config;
if (!function_exists('get_status_banjir'))
{
    function get_variable_status_banjir($curahhujan, $riwayat_bencana, $kapasitas_drainase, $kepadatan_penduduk){
        // rendah = 0
        // sedang = 1
        // tinggi = 2
        $status_hasil = 0;
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
        if($riwayat_bencana==1||$riwayat_bencana==2){
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
            $status_penduduk = 1;
        }
        else if($kepadatan_penduduk<50&&$kepadatan_penduduk>=20200){
            $status_penduduk = 0;
        }
        else if($kepadatan_penduduk>40350){
            $status_penduduk = 2;
        }
        if($status_curahhujan==0&&$status_bencana==0&&$status_drainase==0&&$status_penduduk=0
            ||$status_curahhujan==0&&$status_bencana==0&&$status_drainase==1&&$status_penduduk=0
            ||$status_curahhujan==0&&$status_bencana==1&&$status_drainase==0&&$status_penduduk=0
            ||$status_curahhujan==0&&$status_bencana==0&&$status_drainase==0&&$status_penduduk=1
            ||$status_curahhujan==0&&$status_bencana==0&&$status_drainase==1&&$status_penduduk=1
            ||$status_curahhujan==0&&$status_bencana==1&&$status_drainase==0&&$status_penduduk=1
            ||$status_curahhujan==0&&$status_bencana==0&&$status_drainase==0&&$status_penduduk=2
            ||$status_curahhujan==1&&$status_bencana==0&&$status_drainase==0&&$status_penduduk=0
            ||$status_curahhujan==1&&$status_bencana==0&&$status_drainase==0&&$status_penduduk=1
            ||$status_curahhujan==1&&$status_bencana==1&&$status_drainase==0&&$status_penduduk=1
            ||$status_curahhujan==2&&$status_bencana==0&&$status_drainase==0&&$status_penduduk=0
            ||$status_curahhujan==2&&$status_bencana==0&&$status_drainase==0&&$status_penduduk=1
            ||$status_curahhujan==2&&$status_bencana==0&&$status_drainase==0&&$status_penduduk=2
        ) {
            $status_hasil = 0;
        } else if(
            $status_curahhujan==0&&$status_bencana==2&&$status_drainase==1&&$status_penduduk=0
            ||$status_curahhujan==0&&$status_bencana==2&&$status_drainase==2&&$status_penduduk=0
            ||$status_curahhujan==0&&$status_bencana==2&&$status_drainase==1&&$status_penduduk=1
            ||$status_curahhujan==0&&$status_bencana==2&&$status_drainase==2&&$status_penduduk=1
            ||$status_curahhujan==0&&$status_bencana==1&&$status_drainase==1&&$status_penduduk=2
            ||$status_curahhujan==0&&$status_bencana==1&&$status_drainase==2&&$status_penduduk=2
            ||$status_curahhujan==0&&$status_bencana==2&&$status_drainase==0&&$status_penduduk=2
            ||$status_curahhujan==0&&$status_bencana==2&&$status_drainase==1&&$status_penduduk=2
            ||$status_curahhujan==0&&$status_bencana==2&&$status_drainase==2&&$status_penduduk=2
             ||$status_curahhujan==1&&$status_bencana==2&&$status_drainase==1&&$status_penduduk=0
             ||$status_curahhujan==1&&$status_bencana==2&&$status_drainase==2&&$status_penduduk=0
             ||$status_curahhujan==1&&$status_bencana==2&&$status_drainase==1&&$status_penduduk=1
             ||$status_curahhujan==1&&$status_bencana==2&&$status_drainase==2&&$status_penduduk=1||
        $status_curahhujan==1&&$status_bencana==1&&$status_drainase==1&&$status_penduduk=2||
        $status_curahhujan==1&&$status_bencana==1&&$status_drainase==2&&$status_penduduk=2||
        $status_curahhujan==1&&$status_bencana==2&&$status_drainase==0&&$status_penduduk=2||
        $status_curahhujan==1&&$status_bencana==2&&$status_drainase==1&&$status_penduduk=2||
        $status_curahhujan==1&&$status_bencana==2&&$status_drainase==2&&$status_penduduk=2||
        $status_curahhujan==2&&$status_bencana==1&&$status_drainase==1&&$status_penduduk=0||

        $status_curahhujan==2&&$status_bencana==1&&$status_drainase==2&&$status_penduduk=0||
        $status_curahhujan==2&&$status_bencana==2&&$status_drainase==0&&$status_penduduk=0||
        $status_curahhujan==2&&$status_bencana==2&&$status_drainase==1&&$status_penduduk=0||
        $status_curahhujan==2&&$status_bencana==2&&$status_drainase==2&&$status_penduduk=0||
        $status_curahhujan==2&&$status_bencana==1&&$status_drainase==1&&$status_penduduk=1||

        $status_curahhujan==2&&$status_bencana==1&&$status_drainase==2&&$status_penduduk=1||
        $status_curahhujan==2&&$status_bencana==2&&$status_drainase==1&&$status_penduduk=1||
        $status_curahhujan==2&&$status_bencana==2&&$status_drainase==2&&$status_penduduk=1||
        $status_curahhujan==2&&$status_bencana==1&&$status_drainase==1&&$status_penduduk=2||
        $status_curahhujan==2&&$status_bencana==1&&$status_drainase==2&&$status_penduduk=2||
        $status_curahhujan==2&&$status_bencana==2&&$status_drainase==0&&$status_penduduk=2||
        $status_curahhujan==2&&$status_bencana==2&&$status_drainase==1&&$status_penduduk=2||
        $status_curahhujan==2&&$status_bencana==2&&$status_drainase==2&&$status_penduduk=2){
            $status_hasil = 2;
        } else if($status_curahhujan==0&&$status_bencana==0&&$status_drainase==2&&$status_penduduk=0||
                $status_curahhujan==0&&$status_bencana==1&&$status_drainase==1&&$status_penduduk=0||
                $status_curahhujan==0&&$status_bencana==1&&$status_drainase==2&&$status_penduduk=0||
                $status_curahhujan==0&&$status_bencana==1&&$status_drainase==0&&$status_penduduk=0||
                $status_curahhujan==0&&$status_bencana==0&&$status_drainase==2&&$status_penduduk=1||
                $status_curahhujan==0&&$status_bencana==1&&$status_drainase==1&&$status_penduduk=1||
                $status_curahhujan==0&&$status_bencana==1&&$status_drainase==2&&$status_penduduk=1||
                $status_curahhujan==0&&$status_bencana==2&&$status_drainase==0&&$status_penduduk=1||
                $status_curahhujan==0&&$status_bencana==0&&$status_drainase==1&&$status_penduduk=2||
                $status_curahhujan==0&&$status_bencana==0&&$status_drainase==2&&$status_penduduk=2||
                $status_curahhujan==0&&$status_bencana==1&&$status_drainase==0&&$status_penduduk=2||
                $status_curahhujan==1&&$status_bencana==0&&$status_drainase==1&&$status_penduduk=0||
                $status_curahhujan==1&&$status_bencana==0&&$status_drainase==2&&$status_penduduk=0||
                $status_curahhujan==1&&$status_bencana==1&&$status_drainase==0&&$status_penduduk=0||
                $status_curahhujan==1&&$status_bencana==1&&$status_drainase==1&&$status_penduduk=0||
                $status_curahhujan==1&&$status_bencana==1&&$status_drainase==2&&$status_penduduk=0||
                $status_curahhujan==1&&$status_bencana==2&&$status_drainase==0&&$status_penduduk=0||
                $status_curahhujan==1&&$status_bencana==0&&$status_drainase==1&&$status_penduduk=1||
                $status_curahhujan==1&&$status_bencana==0&&$status_drainase==2&&$status_penduduk=1||
                $status_curahhujan==1&&$status_bencana==1&&$status_drainase==1&&$status_penduduk=1||
                $status_curahhujan==1&&$status_bencana==1&&$status_drainase==2&&$status_penduduk=1||
                $status_curahhujan==1&&$status_bencana==2&&$status_drainase==1&&$status_penduduk=1||
                $status_curahhujan==1&&$status_bencana==0&&$status_drainase==2&&$status_penduduk=2||
                $status_curahhujan==1&&$status_bencana==0&&$status_drainase==2&&$status_penduduk=2||
                $status_curahhujan==1&&$status_bencana==1&&$status_drainase==2&&$status_penduduk=2||
                $status_curahhujan==2&&$status_bencana==2&&$status_drainase==0&&$status_penduduk=0||
                $status_curahhujan==2&&$status_bencana==2&&$status_drainase==0&&$status_penduduk=0||
                $status_curahhujan==2&&$status_bencana==2&&$status_drainase==0&&$status_penduduk=0||
                $status_curahhujan==2&&$status_bencana==2&&$status_drainase==1&&$status_penduduk=1||
                $status_curahhujan==2&&$status_bencana==2&&$status_drainase==1&&$status_penduduk=1||
                $status_curahhujan==2&&$status_bencana==2&&$status_drainase==1&&$status_penduduk=1||
                $status_curahhujan==2&&$status_bencana==2&&$status_drainase==1&&$status_penduduk=1||
                $status_curahhujan==2&&$status_bencana==2&&$status_drainase==2&&$status_penduduk=2||
                $status_curahhujan==2&&$status_bencana==2&&$status_drainase==2&&$status_penduduk=2||
                $status_curahhujan==2&&$status_bencana==2&&$status_drainase==1&&$status_penduduk=1||
                $status_curahhujan==2&&$status_bencana==0&&$status_drainase==1&&$status_penduduk=2)
        {
            $status_hasil = 1;
        }
//        return [
//          'curah_hujan' => $status_curahhujan,
//          'riwayat_bencana_banjir' => $status_bencana,
//            'kepadatan_penduduk' => $status_penduduk,
//            'kapasitas_drainase' => $status_drainase
//        ];
        return $status_hasil;
    }
    function get_variable_status_longsor($curahhujan, $riwayat_bencana, $kemiringan_lahan){
        // rendah = 0
        // sedang = 1
        // tinggi = 2
        $status_curahhujan = 0;
        $status_bencana = 0;
        $status_kemiringan = 0;
        $status_hasil = 0;
        if($curahhujan>100&&$curahhujan<=200){
            $status_curahhujan = 1;
        }
        else if($curahhujan<=100){
            $status_curahhujan = 0;
        }
        else if($curahhujan>200){
            $status_curahhujan = 2;
        }
        if($riwayat_bencana==1||$riwayat_bencana==2){
            $status_bencana = 1;
        }
        else if($riwayat_bencana==0){
            $status_bencana = 0;
        }
        else if($riwayat_bencana>2){
            $status_bencana = 2;
        }
        if($kemiringan_lahan>=16&&$kemiringan_lahan<=25){
            $status_kemiringan = 1;
        }
        else if($kemiringan_lahan<8){
            $status_kemiringan = 0;
        }
        else if($kemiringan_lahan>45){
            $status_kemiringan = 2;
        }

        //rule based system
        if($status_curahhujan==0&&$status_bencana==0&&$status_kemiringan==0
            ||$status_curahhujan==0&&$status_bencana==0&&$status_kemiringan==1
            ||$status_curahhujan==0&&$status_bencana==1&&$status_kemiringan==0
            ||$status_curahhujan==1&&$status_bencana==0&&$status_kemiringan==0
            ||$status_curahhujan==2&&$status_bencana==0&&$status_kemiringan==0){
            $status_hasil = 0;
        } else if($status_curahhujan==0&&$status_bencana==0&&$status_kemiringan==2
            ||$status_curahhujan==0&&$status_bencana==1&&$status_kemiringan==1
            ||$status_curahhujan==0&&$status_bencana==1&&$status_kemiringan==2
            ||$status_curahhujan==0&&$status_bencana==2&&$status_kemiringan==0
            ||$status_curahhujan==1&&$status_bencana==0&&$status_kemiringan==1
            ||$status_curahhujan==1&&$status_bencana==0&&$status_kemiringan==2
            ||$status_curahhujan==1&&$status_bencana==1&&$status_kemiringan==0
            ||$status_curahhujan==1&&$status_bencana==1&&$status_kemiringan==1
            ||$status_curahhujan==1&&$status_bencana==1&&$status_kemiringan==2
            ||$status_curahhujan==1&&$status_bencana==2&&$status_kemiringan==0
            ||$status_curahhujan==2&&$status_bencana==0&&$status_kemiringan==1
            ||$status_curahhujan==2&&$status_bencana==0&&$status_kemiringan==2
            ||$status_curahhujan==2&&$status_bencana==1&&$status_kemiringan==0){
            $status_hasil = 1;
        } else if($status_curahhujan==0&&$status_bencana==2&&$status_kemiringan==1
                ||$status_curahhujan==0&&$status_bencana==2&&$status_kemiringan==2
                ||$status_curahhujan==1&&$status_bencana==2&&$status_kemiringan==1
                ||$status_curahhujan==1&&$status_bencana==2&&$status_kemiringan==2
                ||$status_curahhujan==2&&$status_bencana==1&&$status_kemiringan==1
                ||$status_curahhujan==2&&$status_bencana==1&&$status_kemiringan==2
                ||$status_curahhujan==2&&$status_bencana==2&&$status_kemiringan==0
                ||$status_curahhujan==2&&$status_bencana==2&&$status_kemiringan==1
                ||$status_curahhujan==2&&$status_bencana==2&&$status_kemiringan==2){
                $status_hasil = 2;
        }
        // return [
        //     'curah_hujan' => $status_curahhujan,
        //     'riwayat_bencana_longsor' => $status_bencana,
        //     'kemiringan_lahan' => $status_kemiringan,
        // ];
       return $status_hasil;
    }
    function get_variable_status_kekeringan($jarak_sumber, $riwayat_bencana, $kepadatan_penduduk){
        // rendah = 0
        // sedang = 1
        // tinggi = 2
        $status_sumber = 0;
        $status_bencana = 0;
        $status_penduduk = 0;
        $status_hasil = 0;
        if($jarak_sumber>=1.1&&$jarak_sumber<=2){
            $status_sumber = 1;
        }
        else if($jarak_sumber<=1){
            $status_sumber = 0;
        }
        else if($jarak_sumber>2){
            $status_sumber = 2;
        }
        if($riwayat_bencana==1||$riwayat_bencana==2){
            $status_bencana = 1;
        }
        else if($riwayat_bencana==0){
            $status_bencana = 0;
        }
        else if($riwayat_bencana>2){
            $status_bencana = 2;
        }
        if($kepadatan_penduduk>=2001&&$kepadatan_penduduk<=3000){
            $status_penduduk = 1;
        }
        else if($kepadatan_penduduk<=2000){
            $status_penduduk = 0;
        }
        else if($kepadatan_penduduk>3000){
            $status_penduduk = 2;
        }

        //rule based system

        //rendah
        if($status_penduduk==0&&$status_bencana==0&&$status_sumber==0
            ||$status_penduduk==0&&$status_bencana==0&&$status_sumber==1
            ||$status_penduduk==0&&$status_bencana==1&&$status_sumber==0
            ||$status_penduduk==1&&$status_bencana==0&&$status_sumber==0
            ||$status_penduduk==2&&$status_bencana==0&&$status_sumber==0){
            $status_hasil = 0;
        }
        //sedang
        else if($status_penduduk==0&&$status_bencana==0&&$status_sumber==2
                ||$status_penduduk==0&&$status_bencana==1&&$status_sumber==1
                ||$status_penduduk==0&&$status_bencana==1&&$status_sumber==2
                ||$status_penduduk==0&&$status_bencana==2&&$status_sumber==0
                ||$status_penduduk==1&&$status_bencana==0&&$status_sumber==1
                ||$status_penduduk==1&&$status_bencana==0&&$status_sumber==2
                ||$status_penduduk==1&&$status_bencana==1&&$status_sumber==0
                ||$status_penduduk==1&&$status_bencana==1&&$status_sumber==1
                ||$status_penduduk==1&&$status_bencana==1&&$status_sumber==2
                ||$status_penduduk==1&&$status_bencana==2&&$status_sumber==0
                ||$status_penduduk==2&&$status_bencana==0&&$status_sumber==1
                ||$status_penduduk==2&&$status_bencana==0&&$status_sumber==2
                ||$status_penduduk==2&&$status_bencana==1&&$status_sumber==0){
            $status_hasil = 1;
        }
        //tinggi
        else if($status_penduduk==0&&$status_bencana==2&&$status_sumber==1
                ||$status_penduduk==0&&$status_bencana==2&&$status_sumber==2
                ||$status_penduduk==1&&$status_bencana==2&&$status_sumber==1
                ||$status_penduduk==1&&$status_bencana==2&&$status_sumber==2
                ||$status_penduduk==2&&$status_bencana==1&&$status_sumber==1
                ||$status_penduduk==2&&$status_bencana==1&&$status_sumber==2
                ||$status_penduduk==2&&$status_bencana==2&&$status_sumber==0
                ||$status_penduduk==2&&$status_bencana==2&&$status_sumber==1
                ||$status_penduduk==2&&$status_bencana==2&&$status_sumber==2){
            $status_hasil = 2;
        }
//        return [
//            'jarak_sumber_air' => $status_sumber,
//            'riwayat_bencana_kekeringan' => $status_bencana,
//            'kepadatan_penduduk' => $status_penduduk,
//        ];
        return $status_hasil;
    }
    function get_variable_status_putbel($curahhujan, $riwayat_bencana){
        // rendah = 0
        // sedang = 1
        // tinggi = 2
        $status_curahhujan = 0;
        $status_bencana = 0;
        $status_hasil = 0;
        if($curahhujan>100&&$curahhujan<=200){
            $status_curahhujan = 1;
        }
        else if($curahhujan<=100){
            $status_curahhujan = 0;
        }
        else if($curahhujan>200){
            $status_curahhujan = 2;
        }
        if($riwayat_bencana==1||$riwayat_bencana==2){
            $status_bencana = 1;
        }
        else if($riwayat_bencana==0){
            $status_bencana = 0;
        }
        else if($riwayat_bencana>2){
            $status_bencana = 2;
        }

        //rule based system

        //rendah
        if($status_curahhujan==0&&$status_bencana==0
            ||$status_curahhujan==1&&$status_bencana==0){
            $status_hasil = 0;
        }
        //sedang
        else if($status_curahhujan==0&&$status_bencana==1
            ||$status_curahhujan==0&&$status_bencana==2
            ||$status_curahhujan==1&&$status_bencana==1
            ||$status_curahhujan==1&&$status_bencana==2
            ||$status_curahhujan==2&&$status_bencana==0){
            $status_hasil = 1;
        }
        //tinggi
        else if($status_curahhujan==2&&$status_bencana==1
            ||$status_curahhujan==2&&$status_bencana==2){
            $status_hasil = 2;
        }

        return $status_hasil;
    }


}

