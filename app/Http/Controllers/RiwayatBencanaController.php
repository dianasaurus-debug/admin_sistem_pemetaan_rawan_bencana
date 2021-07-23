<?php

namespace App\Http\Controllers;

use App\Models\BencanaBaru;
use App\Models\JenisBencana;
use App\Models\Kelurahan;
use App\Models\RiwayatBencana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class RiwayatBencanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->query('cari_baru')) {
            $bencana_baru = BencanaBaru::whereHas('desa', function ($q){
                $q->where('kel_nama', 'like',
                    '%' . request()->query('cari_baru') . '%');
            })->latest()->with('bencana')->with('desa')->paginate(2)->appends(request()->query());
            $riwayat_bencana = RiwayatBencana::latest()->with('bencana')->with('desa')->paginate(3);
        } else if(request()->query('cari_lama')) {
            $riwayat_bencana = RiwayatBencana::whereHas('desa', function ($q){
                $q->where('kel_nama', 'like',
                    '%' . request()->query('cari_lama') . '%');
            })->latest()->with('bencana')->with('desa')->paginate(3)->appends(request()->query());
            $bencana_baru = BencanaBaru::latest()->with('bencana')->with('desa')->paginate(2);
        } else {
            $riwayat_bencana = RiwayatBencana::latest()->with('bencana')->with('desa')->paginate(3);
            $bencana_baru = BencanaBaru::latest()->with('bencana')->with('desa')->paginate(2);
        }
        $data_desa = Kelurahan::all();
        $jenis_bencana = JenisBencana::all();
        return Inertia::render('RiwayatBencana', ['riwayat_bencana' => $riwayat_bencana, 'bencana_baru' => $bencana_baru, 'data_desa' => $data_desa, 'jenis_bencana' => $jenis_bencana]);
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
            "id_jenis_bencana" => ['required'],
            "id_kelurahan" => ['required'],
            "rb_kerusakan" => ['required'],
            "rb_kerugian" => ['required'],
            "rb_longitude" => ['required'],
            "rb_latitude" => ['required'],
            "rb_status_perbaikan" => ['required'],
            "rb_bulan" => ['required'],
            "rb_tahun" => ['required']
        ])->validate();

        RiwayatBencana::create($request->all());

        return redirect()->back()
            ->with('message', 'Data Riwayat Bencana sukses dibuat.');
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
            "id_jenis_bencana" => ['required'],
            "id_kelurahan" => ['required'],
            "rb_kerusakan" => ['required'],
            "rb_kerugian" => ['required'],
            "rb_longitude" => ['required'],
            "rb_latitude" => ['required'],
            "rb_status_perbaikan" => ['required'],
            "rb_bulan" => ['required'],
            "rb_tahun" => ['required']
        ])->validate();

        if ($id) {
            RiwayatBencana::find($id)->update($request->all());
            return redirect()->back()
                ->with('message', 'Riwayat Bencana sukses diupdate.');
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
            RiwayatBencana::find($id)->delete();
            return redirect()->back();
        }
    }
}
