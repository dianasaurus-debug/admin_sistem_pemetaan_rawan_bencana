<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(){
        $kecamatan = Kecamatan::all();
        $desa = Kelurahan::all();
        return Inertia::render('Dashboard', ['kecamatan' => $kecamatan, 'desa' => $desa]);
    }
}
