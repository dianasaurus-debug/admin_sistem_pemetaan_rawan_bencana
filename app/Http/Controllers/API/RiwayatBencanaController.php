<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\RiwayatBencanaResource;
use App\Models\RiwayatBencana;
use Illuminate\Http\Request;

class RiwayatBencanaController extends Controller
{
    public function riwayat_banjir(){
        $riwayat_bencana_banjir = RiwayatBencana::where('id_jenis_bencana', 1)
                                    ->with('desa')
                                    ->get();
        $response = [
            'riwayat_bencana' => RiwayatBencanaResource::collection($riwayat_bencana_banjir)
        ];
        return response()->json($response, 200);
    }
    public function riwayat_longsor(){
        $riwayat_bencana_longsor = RiwayatBencana::where('id_jenis_bencana', 2)
                                    ->with('desa')
                                    ->get();
        $response = [
            'riwayat_bencana' => RiwayatBencanaResource::collection($riwayat_bencana_longsor)
        ];
        return response()->json($response, 200);
    }
    public function riwayat_kekeringan(){
        $riwayat_bencana_kekeringan = RiwayatBencana::where('id_jenis_bencana', 3)
                                        ->with('desa')
                                        ->get();
        $response = [
            'riwayat_bencana' => RiwayatBencanaResource::collection($riwayat_bencana_kekeringan)
        ];
        return response()->json($response, 200);
    }
    public function riwayat_puting_beliung(){
        $riwayat_bencana_puting_beliung = RiwayatBencana::where('id_jenis_bencana', 4)
                                            ->with('desa')
                                            ->get();
        $response = [
            'riwayat_bencana' => RiwayatBencanaResource::collection($riwayat_bencana_puting_beliung)
        ];
        return response()->json($response, 200);
    }
    public function indexByYear($year, $jenis_bencana)
    {
        $riwayat_bencana = RiwayatBencana::where('rb_tahun', $year)
            ->where('id_jenis_bencana', $jenis_bencana)
            ->get();
        $response = [
            'riwayat_bencana' => RiwayatBencanaResource::collection($riwayat_bencana)
        ];
        return response()->json($response, 200);
    }
}
