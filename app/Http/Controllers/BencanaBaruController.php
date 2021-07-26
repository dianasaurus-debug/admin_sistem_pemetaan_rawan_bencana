<?php

namespace App\Http\Controllers;

use App\Models\BencanaBaru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BencanaBaruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            "id_jenis_bencana" => 'required',
            "id_kelurahan" => 'required',
            "bb_longitude" => 'required',
            "bb_latitude" => 'required',
            "bb_foto_bencana" => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            "bb_tanggal" => 'required|date'
        ])->validate();
        $nama_foto_bencana = time().'.'.$request->bb_foto_bencana->getClientOriginalExtension();
        $request->bb_foto_bencana->move(public_path('images/foto_bencana'), $nama_foto_bencana);
        BencanaBaru::create([
            "id_jenis_bencana" => $request->id_jenis_bencana,
            "id_kelurahan" => $request->id_kelurahan,
            "bb_longitude" => $request->bb_longitude,
            "bb_latitude" => $request->bb_latitude,
            "bb_foto_bencana" => $nama_foto_bencana,
            "bb_tanggal" => $request->bb_tanggal
        ]);

        return redirect()->back()
            ->with('message', 'Data Bencana Baru sukses dibuat.');
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
        $bencana_baru = BencanaBaru::findOrFail($id);
        if($request->hasFile('bb_foto_bencana')){
            $this->validate($request, [
                "id_jenis_bencana" => 'required',
                "id_kelurahan" => 'required',
                "bb_longitude" => 'required',
                "bb_latitude" => 'required',
                "bb_foto_bencana" => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                "bb_tanggal" => 'required|date'
            ]);
            $path = public_path().'/images/foto_bencana/';

            //code for remove old file
            if($bencana_baru->bb_foto_bencana != ''  && $bencana_baru->bb_foto_bencana != null){
                $file_old = $path.$bencana_baru->bb_foto_bencana;
                unlink($file_old);
            }
            //upload new file
            $file = $request->bb_foto_bencana;
            $filename = time().'.'.$file->getClientOriginalName();
            $file->move($path, $filename);
            $bencana_baru->update(['bb_foto_bencana' => $filename]);
            $bencana_baru->update(['id_jenis_bencana' => $request->id_jenis_bencana]);
            $bencana_baru->update(['id_kelurahan' => $request->id_kelurahan]);
            $bencana_baru->update(['bb_longitude' => $request->bb_longitude]);
            $bencana_baru->update(['bb_latitude' => $request->bb_latitude]);
            $bencana_baru->update(['bb_tanggal' => $request->bb_tanggal]);
            return response()->json('Data bencana baru sukses diupdate', 200);
        } else {
            $this->validate($request, [
                "id_jenis_bencana" => 'required',
                "id_kelurahan" => 'required',
                "bb_longitude" => 'required',
                "bb_latitude" => 'required',
                "bb_tanggal" => 'required|date'
            ]);

            $bencana_baru->update(['id_jenis_bencana' => $request->id_jenis_bencana]);
            $bencana_baru->update(['id_kelurahan' => $request->id_kelurahan]);
            $bencana_baru->update(['bb_longitude' => $request->bb_longitude]);
            $bencana_baru->update(['bb_latitude' => $request->bb_latitude]);
            $bencana_baru->update(['bb_tanggal' => $request->bb_tanggal]);

            return response()->json('Data bencana baru sukses diupdate', 200);
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
            BencanaBaru::find($id)->delete();
            return redirect('/riwayat-bencana');
        }
    }
}
