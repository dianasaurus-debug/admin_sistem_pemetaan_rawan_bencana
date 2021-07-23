<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\KekeringanResource;
use App\Http\Resources\LongsorResource;
use App\Http\Resources\PutingBeliungResource;
use App\Http\Resources\RawanBanjirResource;
use App\Models\CurahHujan;
use App\Models\Drainase;
use App\Models\JarakSumberAir;
use App\Models\Kelurahan;
use App\Models\KemiringanLahan;
use App\Models\KepadatanPenduduk;
use App\Models\RiwayatBencana;
use Illuminate\Http\Request;

class PerkiraanBencanaController extends Controller
{

    public function daftar_desa_rawan_banjir()
    {
        $kelurahan = Kelurahan::with('kecamatan.stasiun_hujan.curah_hujan')
            ->with(['riwayat_bencana' => function ($query)  {
                $query->where(['id_jenis_bencana' => 1]);
            }])
            ->with('kecamatan.drainase')
            ->with('kepadatan_penduduk')
            ->get();
//        return get_variable_status_banjir($data['curah_hujan'], $data['riwayat_bencana'], $data['kapasitas_drainase'], $data['jumlah_penduduk']);
        $response = [
            'bencana_rawan' => RawanBanjirResource::collection($kelurahan)
        ];
        return response()->json($response, 200);

    }
    public function daftar_desa_rawan_longsor()
    {
//        $curahhujan, $riwayat_bencana, $kemiringan_lahan
//        $kelurahan = Kelurahan::where('id', 49)->with('kecamatan')->first();
//        $riwayat_bencana_longsor = RiwayatBencana::where('id_jenis_bencana', 2)->where('id_kelurahan', 49)->count();
//        $kemiringan_lahan = KemiringanLahan::where('id_kelurahan', $kelurahan->id)->first();
//        $curah_hujan = CurahHujan::whereHas('stasiun', function ($q) use ($kelurahan) {
//            $q->where('id_kecamatan', '=', $kelurahan->kecamatan->id);
//        })->first();
//        $data = [
//            'riwayat_bencana' => $riwayat_bencana_longsor,
//            'curah_hujan' => $curah_hujan->ch_volume,
//            'kemiringan_lahan' => $kemiringan_lahan->kemiringan_indeks
//        ];
//
//        return get_variable_status_longsor($data['curah_hujan'], $data['riwayat_bencana'], $data['kemiringan_lahan']);
        $kelurahan = Kelurahan::with('kecamatan.stasiun_hujan.curah_hujan')
            ->with(['riwayat_bencana' => function ($query)  {
                $query->where(['id_jenis_bencana' => 2]);
            }])
            ->with('kemiringan_lahan')
            ->get();
        $response = [
            'bencana_rawan' => LongsorResource::collection($kelurahan)
        ];
        return response()->json($response, 200);



    }
    public function daftar_desa_rawan_kekeringan()
    {
//        $jarak_sumber, $riwayat_bencana, $kepadatan_penduduk
//        $kelurahan = Kelurahan::where('id', 49)->with('kecamatan')->first();
//        $riwayat_bencana_kekeringan = RiwayatBencana::where('id_jenis_bencana', 3)->where('id_kelurahan', 49)->count();
//        $jarak = JarakSumberAir::where('id_kelurahan', $kelurahan->id)->first();
//        $jumlah_penduduk = KepadatanPenduduk::where('id_kelurahan', 49)->first();
//        $data = [
//            'riwayat_bencana' => $riwayat_bencana_kekeringan,
//            'jumlah_penduduk' => $jumlah_penduduk->jumlah_penduduk,
//            'jarak_sumber' => $jarak->jarak_sumberair,
//        ];
//
//        return get_variable_status_kekeringan($data['jarak_sumber'], $data['riwayat_bencana'], $data['jumlah_penduduk']);
//            ->with('desa')
//            ->get();
//        $response = [
//            'riwayat_bencana' => RiwayatBencanaResource::collection($riwayat_bencana_longsor)
//        ];
//        return response()->json($response, 200);
        $kelurahan = Kelurahan::with(['riwayat_bencana' => function ($query)  {
            $query->where(['id_jenis_bencana' => 3]);
        }])
            ->with('jarak_sumber')
            ->with('kepadatan_penduduk')
            ->get();
        $response = [
            'bencana_rawan' =>  KekeringanResource::collection($kelurahan)
        ];
        return response()->json($response, 200);
    }
    public function daftar_desa_rawan_putbel()
    {
//        $kelurahan = Kelurahan::where('id', 49)->with('kecamatan')->first();
//        $riwayat_bencana_banjir = RiwayatBencana::where('id_jenis_bencana', 4)->where('id_kelurahan', 49)->count();
//        $curah_hujan = CurahHujan::whereHas('stasiun', function ($q) use ($kelurahan) {
//            $q->where('id_kecamatan', '=', $kelurahan->kecamatan->id);
//        })->first();
//        $data = [
//            'riwayat_bencana' => $riwayat_bencana_banjir,
//            'curah_hujan' => $curah_hujan->ch_volume,
//        ];
//
//        return get_variable_status_putbel($data['curah_hujan'], $data['riwayat_bencana']);
        $kelurahan = Kelurahan::with('kecamatan.stasiun_hujan.curah_hujan')
            ->with(['riwayat_bencana' => function ($query)  {
                $query->where(['id_jenis_bencana' => 4]);
            }])
            ->with('kepadatan_penduduk')
            ->get();
        $response = [
            'bencana_rawan' => PutingBeliungResource::collection($kelurahan)
        ];
        return response()->json($response, 200);

    }



}
