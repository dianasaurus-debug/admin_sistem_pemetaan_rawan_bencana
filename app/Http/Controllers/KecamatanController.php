<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->query('cari')) {
            $kecamatan = Kecamatan::where(
                'kec_nama', 'like',
                '%' . request()->query('cari') . '%'
            )->latest()->paginate(7)->appends(request()->query());
        } else {
            $kecamatan = Kecamatan::latest()->paginate(7);
        }
        return Inertia::render('Kecamatan', ['kecamatan' => $kecamatan]);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'kec_nama' => ['required'],
            'kec_latitude' => ['required'],
            'kec_longitude' => ['required'],
        ])->validate();

        Kecamatan::create($request->all());
        return redirect()->back()
            ->with('message', 'Kecamatan sukses ditambah.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'kec_nama' => ['required'],
            'kec_latitude' => ['required'],
            'kec_longitude' => ['required'],
        ])->validate();

        if ($id) {
            Kecamatan::find($id)->update($request->all());
            return redirect()->back()
                ->with('message', 'Kecamatan sukses diupdate.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id) {
            Kecamatan::find($id)->delete();
            return redirect()->back();
        }
    }
}
