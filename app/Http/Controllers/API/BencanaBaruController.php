<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BencanaBaru;
use App\Http\Resources\BencanaBaruResource;


class BencanaBaruController extends Controller
{
    public function bencana_baru_banjir(){
        $bencana_baru_bencana_banjir = BencanaBaru::where('id_jenis_bencana', 1)
                                    ->with('desa')
                                    ->get();
        $response = [
            'bencana_baru' => BencanaBaruResource::collection($bencana_baru_bencana_banjir)
        ];
        return response()->json($response, 200);
    }
    public function bencana_baru_longsor(){
        $bencana_baru_bencana_longsor = BencanaBaru::where('id_jenis_bencana', 2)
                                    ->with('desa')
                                    ->get();
        $response = [
            'bencana_baru' => BencanaBaruResource::collection($bencana_baru_bencana_longsor)
        ];
        return response()->json($response, 200);
    }
    public function bencana_baru_kekeringan(){
        $bencana_baru_bencana_kekeringan = BencanaBaru::where('id_jenis_bencana', 3)
                                        ->with('desa')
                                        ->get();
        $response = [
            'bencana_baru' => BencanaBaruResource::collection($bencana_baru_bencana_kekeringan)
        ];
        return response()->json($response, 200);
    }
    public function bencana_baru_puting_beliung(){
        $bencana_baru_bencana_puting_beliung = BencanaBaru::where('id_jenis_bencana', 4)
                                            ->with('desa')
                                            ->get();
        $response = [
            'bencana_baru' => BencanaBaruResource::collection($bencana_baru_bencana_puting_beliung)
        ];
        return response()->json($response, 200);
    }
}
