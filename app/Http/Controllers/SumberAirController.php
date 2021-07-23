<?php

namespace App\Http\Controllers;

use App\Models\JarakSumberAir;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class SumberAirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->query('cari')) {
            $jarak_sumberair = JarakSumberAir::whereHas('desa', function ($q){
                $q->where('kel_nama', 'like',
                    '%' . request()->query('cari') . '%');
            })->latest()->with('kecamatan')->with('desa')->paginate(7)->appends(request()->query());
        } else {
            $jarak_sumberair = JarakSumberAir::latest()->with('kecamatan')->with('desa')->paginate(7);
        }
        $kecamatan = Kecamatan::with('desa')->get();

        return Inertia::render('JarakSumberAir', ['jarak_sumberair' => $jarak_sumberair, 'kecamatan' => $kecamatan]);
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
            'id_kelurahan' => ['required'],
            'id_kecamatan' => ['required'],
            'jarak_sumberair' => ['required'],
        ])->validate();

        JarakSumberAir::create($request->all());

        return redirect()->back()
            ->with('message', 'Jarak Sumber air sukses dibuat.');
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
            'id_kelurahan' => ['required'],
            'id_kecamatan' => ['required'],
            'jarak_sumberair' => ['required'],
        ])->validate();

        JarakSumberAir::find($id)->update($request->all());

        return redirect()->back()
            ->with('message', 'Jarak Sumber air sukses diubah.');
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
            JarakSumberAir::find($id)->delete();
            return redirect()->back();
        }
    }
}
