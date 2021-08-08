<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\LokasiDesaResource;
use App\Http\Resources\PutingBeliungResource;
use App\Models\Kelurahan;
use Illuminate\Http\Request;

class LokasiDesaController extends Controller
{
    public function index(){
        $kelurahan = Kelurahan::with('kecamatan.stasiun_hujan.curah_hujan')
            ->with('riwayat_bencana')
            ->with('kepadatan_penduduk')
            ->with('kemiringan_lahan')
            ->with('jarak_sumber')
            ->get();
        $response = [
            'data_desa' => LokasiDesaResource::collection($kelurahan)
        ];
        return response()->json($response, 200);
    }
}
