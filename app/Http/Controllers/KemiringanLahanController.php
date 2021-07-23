<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\KemiringanLahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class KemiringanLahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->query('cari')) {
            $kemiringan_lahan = KemiringanLahan::whereHas('desa', function ($q){
                $q->where('kel_nama', 'like',
                    '%' . request()->query('cari') . '%');
            })->latest()->with('kecamatan')->with('desa')->paginate(7)->appends(request()->query());
        } else {
            $kemiringan_lahan = KemiringanLahan::latest()->with('kecamatan')->with('desa')->paginate(7);
        }
        $kecamatan = Kecamatan::with('desa')->get();

        return Inertia::render('KemiringanLahan', ['kemiringan_lahan' => $kemiringan_lahan, 'kecamatan' => $kecamatan]);

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
            'kemiringan_indeks' => ['required'],
        ])->validate();

        KemiringanLahan::create($request->all());

        return redirect()->back()
            ->with('message', 'Data Kemiringan Lahan sukses dibuat.');
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
            'kemiringan_indeks' => ['required'],
        ])->validate();
        KemiringanLahan::find($id)->update($request->all());

        return redirect()->back()
            ->with('message', 'Data Kemiringan Lahan sukses diupdate.');
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
            KemiringanLahan::find($id)->delete();
            return redirect()->back();
        }
    }
}
