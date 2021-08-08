<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\SOPController;
use App\Http\Controllers\API\RiwayatBencanaController;
use App\Http\Controllers\API\PerkiraanBencanaController;
use App\Http\Controllers\API\BencanaBaruController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\API\LokasiDesaController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('sop')->group(function () {
    Route::get('/banjir', [SOPController::class, 'sop_banjir']);
    Route::get('/longsor', [SOPController::class, 'sop_longsor']);
    Route::get('/puting-beliung', [SOPController::class, 'sop_puting_beliung']);
    Route::get('/kekeringan', [SOPController::class, 'sop_kekeringan']);
});
Route::prefix('riwayat-bencana')->group(function () {
    Route::get('/banjir', [RiwayatBencanaController::class, 'riwayat_banjir']);
    Route::get('/longsor', [RiwayatBencanaController::class, 'riwayat_longsor']);
    Route::get('/puting-beliung', [RiwayatBencanaController::class, 'riwayat_puting_beliung']);
    Route::get('/kekeringan', [RiwayatBencanaController::class, 'riwayat_kekeringan']);
    Route::get('/{year}/{jenis_bencana}', [RiwayatBencanaController::class, 'indexByYear']);
});
Route::prefix('bencana-baru')->group(function () {
    Route::get('/banjir', [BencanaBaruController::class, 'bencana_baru_banjir']);
    Route::get('/longsor', [BencanaBaruController::class, 'bencana_baru_longsor']);
    Route::get('/puting-beliung', [BencanaBaruController::class, 'bencana_baru_puting_beliung']);
    Route::get('/kekeringan', [BencanaBaruController::class, 'bencana_baru_kekeringan']);
});
Route::prefix('lokasi-rawan')->group(function () {
    Route::get('/banjir', [PerkiraanBencanaController::class, 'daftar_desa_rawan_banjir']);
    Route::get('/longsor', [PerkiraanBencanaController::class, 'daftar_desa_rawan_longsor']);
    Route::get('/puting-beliung', [PerkiraanBencanaController::class, 'daftar_desa_rawan_putbel']);
    Route::get('/kekeringan', [PerkiraanBencanaController::class, 'daftar_desa_rawan_kekeringan']);

    Route::get('/banjir/{id}', [DesaController::class, 'getStatusBanjir']);
    Route::get('/longsor/{id}', [DesaController::class, 'getStatusLongsor']);
    Route::get('/puting-beliung/{id}', [DesaController::class, 'getStatusPutbel']);
    Route::get('/kekeringan/{id}', [DesaController::class, 'getStatusKekeringan']);
});

Route::get('/semua-desa', [LokasiDesaController::class, 'index']);
