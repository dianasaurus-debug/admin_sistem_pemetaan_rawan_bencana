<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\sop;
use App\Models\DetailSop;
use Illuminate\Http\Request;
use App\Http\Resources\SopResource;
class SOPController extends Controller
{
    public function sop_banjir(){
        $sop_pra = DetailSop::where('id_sop', 1)->get()->toArray();
        $sop_saat = DetailSop::where('id_sop', 2)->get()->toArray();
        $sop_pasca = DetailSop::where('id_sop', 3)->get()->toArray();
        $sopbencana_banjir = [
            'pra_bencana'=> $sop_pra,
            'saat_bencana' => $sop_saat,
            'pasca_bencana' => $sop_pasca
        ];
        return response()->json($sopbencana_banjir, 200);
    }
    public function sop_longsor(){
        $sop_pra = DetailSop::where('id_sop', 7)->get()->toArray();
        $sop_saat = DetailSop::where('id_sop',8)->get()->toArray();
        $sop_pasca = DetailSop::where('id_sop', 9)->get()->toArray();
        $sopbencana_longsor = [
            'pra_bencana'=> $sop_pra,
            'saat_bencana' => $sop_saat,
            'pasca_bencana' => $sop_pasca
        ];
        return response()->json($sopbencana_longsor, 200);
    }
    public function sop_kekeringan(){
        $sop_pra = DetailSop::where('id_sop', 4)->get()->toArray();
        $sop_saat = DetailSop::where('id_sop', 5)->get()->toArray();
        $sop_pasca = DetailSop::where('id_sop', 6)->get()->toArray();
        $sopbencana_kekeringan = [
            'pra_bencana'=> $sop_pra,
            'saat_bencana' => $sop_saat,
            'pasca_bencana' => $sop_pasca
        ];
        return response()->json($sopbencana_kekeringan, 200);
    }
    public function sop_puting_beliung(){
        $sop_pra = DetailSop::where('id_sop', 10)->get()->toArray();
        $sop_saat = DetailSop::where('id_sop', 11)->get()->toArray();
        $sop_pasca = DetailSop::where('id_sop', 12)->get()->toArray();
        $sopbencana_puting_beliung = [
            'pra_bencana'=> $sop_pra,
            'saat_bencana' => $sop_saat,
            'pasca_bencana' => $sop_pasca
        ];
        return response()->json($sopbencana_puting_beliung, 200);
    }
}
