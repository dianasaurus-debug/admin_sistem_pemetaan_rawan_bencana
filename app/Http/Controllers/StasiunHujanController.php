<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\StasiunHujan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class StasiunHujanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->query('cari')) {
            $stasiun_hujan = StasiunHujan::whereHas('kecamatan', function ($q){
                $q->where('kec_nama', 'like',
                    '%' . request()->query('cari') . '%');
            })->orWhere('sh_nama', 'like',
                '%' . request()->query('cari') . '%')->latest()->with('kecamatan')->paginate(7)->appends(request()->query());
        } else {
            $stasiun_hujan = StasiunHujan::latest()->with('kecamatan')->paginate(7);
        }
        $kecamatan = Kecamatan::all();
        return Inertia::render('StasiunHujan', ['stasiun_hujan' => $stasiun_hujan, 'kecamatan' => $kecamatan]);

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
            'sh_nomor' => ['required'],
            'sh_nama' => ['required'],

        ])->validate();

        StasiunHujan::create($request->all());

        return redirect()->back()
            ->with('message', 'Stasiun Hujan sukses dibuat.');
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
            'sh_nomor' => ['required'],
            'sh_nama' => ['required'],

        ])->validate();

        StasiunHujan::find($id)->update($request->all());

        return redirect()->back()
            ->with('message', 'Stasiun Hujan sukses diubah.');
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
            StasiunHujan::find($id)->delete();
            return redirect()->back();
        }
    }
}
