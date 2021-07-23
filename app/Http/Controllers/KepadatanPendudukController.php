<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\KepadatanPenduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class KepadatanPendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->query('cari')) {
            $kepadatan_penduduk = KepadatanPenduduk::whereHas('desa', function ($q){
                $q->where('kel_nama', 'like',
                    '%' . request()->query('cari') . '%');
            })->latest()->with('kecamatan')->with('desa')->paginate(7)->appends(request()->query());
        } else {
            $kepadatan_penduduk = KepadatanPenduduk::latest()->with('kecamatan')->with('desa')->paginate(7);
        }
        $kecamatan = Kecamatan::with('desa')->get();

        return Inertia::render('KepadatanPenduduk', ['kepadatan_penduduk' => $kepadatan_penduduk, 'kecamatan' => $kecamatan]);
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
            'jumlah_penduduk' => ['required'],
            'kepadatan_penduduk' => ['required'],
            'kepadatan_tahun' => ['required'],

        ])->validate();

        KepadatanPenduduk::create($request->all());

        return redirect()->back()
            ->with('message', 'Kepadatan Penduduk sukses dibuat.');
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
            'jumlah_penduduk' => ['required'],
            'kepadatan_penduduk' => ['required'],
            'kepadatan_tahun' => ['required'],

        ])->validate();

        KepadatanPenduduk::find($id)->update($request->all());

        return redirect()->back()
            ->with('message', 'Kepadatan Penduduk sukses diupdate.');
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
            KepadatanPenduduk::find($id)->delete();
            return redirect()->back();
        }
    }
}
