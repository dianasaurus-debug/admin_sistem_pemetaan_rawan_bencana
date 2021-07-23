<?php

namespace App\Http\Controllers;

use App\Models\CurahHujan;
use App\Models\StasiunHujan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class CurahHujanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->query('cari')) {
            $curahhujan = CurahHujan::whereHas('stasiun', function ($q){
                $q->where('sh_nama', 'like',
                    '%' . request()->query('cari') . '%');
            })->latest()->with('stasiun')->paginate(7)->appends(request()->query());
        } else {
            $curahhujan = CurahHujan::latest()->with('stasiun')->paginate(7);
        }
        $stasiun_hujan = StasiunHujan::all();
        return Inertia::render('CurahHujan', ['curahhujan' => $curahhujan, 'stasiun_hujan' => $stasiun_hujan]);
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
            'id_stasiun' => ['required'],
            'ch_volume' => ['required'],
            'ch_bulan' => ['required'],
            'ch_tahun' => ['required'],
        ])->validate();

        CurahHujan::create($request->all());

        return redirect()->back()
            ->with('message', 'Curah Hujan sukses dibuat.');
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
            'id_stasiun' => ['required'],
            'ch_volume' => ['required'],
            'ch_bulan' => ['required'],
            'ch_tahun' => ['required'],
        ])->validate();

        if ($id) {
            CurahHujan::find($id)->update($request->all());
            return redirect()->back()
                ->with('message', 'Kecamatan sukses diupdate.');
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
            CurahHujan::find($id)->delete();
            return redirect()->back();
        }
    }
}
