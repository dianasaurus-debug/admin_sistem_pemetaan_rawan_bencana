<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use \App\Http\Controllers\KecamatanController;
use \App\Http\Controllers\DrainaseController;
use \App\Http\Controllers\DesaController;
use \App\Http\Controllers\KepadatanPendudukController;
use \App\Http\Controllers\DashboardController;
use \App\Http\Controllers\StasiunHujanController;
use App\Http\Controllers\SumberAirController;
use App\Http\Controllers\CurahHujanController;
use App\Http\Controllers\KemiringanLahanController;
use App\Http\Controllers\PergerakanAwanCBController;
use App\Http\Controllers\RiwayatBencanaController;
use App\Models\sop;
use App\Http\Controllers\BencanaBaruController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::resource('curah-hujan', CurahHujanController::class);
    Route::resource('jarak-sumber-air', SumberAirController::class);
    Route::resource('kelurahan', DesaController::class);
    Route::resource('kecamatan', KecamatanController::class);
    Route::resource('persebaran-drainase', DrainaseController::class);
    Route::resource('kepadatan-penduduk', KepadatanPendudukController::class);
    Route::resource('stasiun-hujan', StasiunHujanController::class);
    Route::resource('kemiringan-lahan', KemiringanLahanController::class);
    Route::resource('pergerakan-awan-cb', PergerakanAwanCBController::class);
    Route::resource('riwayat-bencana', RiwayatBencanaController::class);
    Route::resource('bencana-baru', BencanaBaruController::class);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/sop-bencana', function () {
        $sopbencana_banjir = sop::with('detail_sop')->where('jenis_bencana', '=', 0)->get();
        $sopbencana_kekeringan = sop::with('detail_sop')->where('jenis_bencana', '=', 1)->get();
        $sopbencana_longsor = sop::with('detail_sop')->where('jenis_bencana', '=', 2)->get();
        $sopbencana_puting_beliung = sop::with('detail_sop')->where('jenis_bencana', '=', 3)->get();

        return Inertia::render('SOP', ['sopbencana_banjir' => $sopbencana_banjir,
            'sopbencana_kekeringan' => $sopbencana_kekeringan,
            'sopbencana_longsor' => $sopbencana_longsor,
            'sopbencana_puting_beliung' => $sopbencana_puting_beliung]);
    })->name('sop-bencana');

});
