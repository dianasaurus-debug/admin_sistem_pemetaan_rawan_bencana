<?php

namespace App\Http\Controllers;

use App\Http\Resources\KekeringanResource;
use App\Http\Resources\LongsorResource;
use App\Http\Resources\PutingBeliungResource;
use App\Http\Resources\RawanBanjirResource;
use App\Models\Kelurahan;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class DesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->query('cari')) {
            $desa = Kelurahan::where(
                'kel_nama', 'like',
                '%' . request()->query('cari') . '%'
            )->latest()->with('kecamatan')->paginate(7);
        } else {
            $desa = Kelurahan::latest()->with('kecamatan')->paginate(7);
        }
        $kecamatan = Kecamatan::all();
        return Inertia::render('Desa', ['desa' => $desa, 'kecamatan' => $kecamatan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'id_kecamatan' => ['required'],
            'kel_nama' => ['required'],
            'kel_latitude' => ['required'],
            'kel_longitude' => ['required'],
        ])->validate();

        Kelurahan::create($request->all());

        return redirect()->back()
            ->with('message', 'Kelurahan sukses dibuat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'id_kecamatan' => ['required'],
            'kel_nama' => ['required'],
            'kel_latitude' => ['required'],
            'kel_longitude' => ['required'],
        ])->validate();

        if ($id) {
            Kelurahan::find($id)->update($request->all());
            return redirect()->back()
                ->with('message', 'Kelurahan sukses diupdate.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id) {
            Kelurahan::find($id)->delete();
            return redirect()->back();
        }
    }
    public function getStatusBanjir($id)
    {
        $kelurahan = Kelurahan::where(['id' => $id])->with('kecamatan.stasiun_hujan.curah_hujan')
            ->with(['riwayat_bencana' => function ($query)  {
                $query->where(['id_jenis_bencana' => 1]);
            }])
            ->with('kecamatan.drainase')
            ->with('kepadatan_penduduk')
            ->first();
        $response = new RawanBanjirResource($kelurahan);
        return response()->json($response, 200);
    }
    public function getStatusLongsor($id)
    {
        $kelurahan = Kelurahan::where(['id' => $id])->with('kecamatan.stasiun_hujan.curah_hujan')
            ->with(['riwayat_bencana' => function ($query)  {
                $query->where(['id_jenis_bencana' => 2]);
            }])
            ->with('kemiringan_lahan')
            ->first();
        $response =  new LongsorResource($kelurahan);
        return response()->json($response, 200);
    }

    public function getStatusKekeringan($id)
    {
        $kelurahan = Kelurahan::where(['id' => $id])->with(['riwayat_bencana' => function ($query)  {
            $query->where(['id_jenis_bencana' => 3]);
        }])
            ->with('jarak_sumber')
            ->with('kepadatan_penduduk')
            ->first();
        $response = new KekeringanResource($kelurahan);
        return response()->json($response, 200);
    }
    public function getStatusPutbel($id)
    {
        $kelurahan = Kelurahan::where(['id' => $id])->with('kecamatan.stasiun_hujan.curah_hujan')
            ->with(['riwayat_bencana' => function ($query)  {
                $query->where(['id_jenis_bencana' => 4]);
            }])
            ->with('kepadatan_penduduk')
            ->first();
        $response = new PutingBeliungResource($kelurahan);
        return response()->json($response, 200);
    }
}
