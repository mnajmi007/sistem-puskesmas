<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pasienController;
use App\Models\Dokter;
use App\Models\Pasien;

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
    return view('welcome');
});

Route::get('/pendaftaran-pasien', 'App\Http\Controllers\pasienController@formPasien');

Route::get('/login-petugas', function(){
    return view('loginPetugas');
});

Route::get('/dashboard', function(){
    return view('dashPetugas');
});

Route::get('/dashboard/pasien', 'App\Http\Controllers\petugasController@informasiPasien');

Route::get('/dashboard/kunjungan', 'App\Http\Controllers\petugasController@dashKunjungan');

Route::get('/dashboard/antrian', 'App\Http\Controllers\petugasController@dashAntrian');

Route::get('/dashboard/poli-gigi', 'App\Http\Controllers\petugasController@dashGigi');

Route::get('/dashboard/kia', 'App\Http\Controllers\petugasController@dashKIA');

Route::get('/dashboard/mtbs', 'App\Http\Controllers\petugasController@dashMTBS');

Route::get('/dashboard/rekam-medis', function(){
    return view('dashRM');
});

Route::get('/dashboard/tambah-pasien', function(){
    return view('dashTambah');
});

Route::get('/dashboard/edit-pasien/{id}', 'App\Http\Controllers\petugasController@dashEdit');

Route::get('/dashboard/pasien/cari/{rm}', 'App\Http\Controllers\petugasController@dashCari');

Route::get('/dashboard/pasien/cari/kunjungan/{rm}', 'App\Http\Controllers\petugasController@cariKunjungan');

Route::get('/dashboard/pasien/cari/rm/{rm}', 'App\Http\Controllers\petugasController@cariRM');

Route::get('/dashboard/pasien/cari/rm/cetak/{rm}', function($rm){
    $no_rm = $rm;
    $get_rm = DB::table('rekam_medis')
              ->join('pasien', 'rekam_medis.no_rm', '=', 'pasien.no_rm')
              ->join('poli', 'rekam_medis.id_poli', '=', 'poli.id_poli')
              ->where('rekam_medis.id_rm', '=', $rm)
              ->get();

    $get_rm2 = DB::table('rekam_medis')->where('rekam_medis.id_rm', '=', $rm)->first();
    $no_rm = $get_rm2->no_rm;

    $pdf = PDF::loadView('cetak_rm',[
        'get_rm'=>$get_rm,
        'no_rm'=>$no_rm
    ]);

    return $pdf->download('pdf_file.pdf');
});

// Post Petugas
Route::post('/tambah-dokter', 'App\Http\Controllers\petugasController@tambahDokter');

Route::post('/tambah-tindakan', 'App\Http\Controllers\petugasController@tambahTindakan');

Route::post('/tambah-diagnosa', 'App\Http\Controllers\petugasController@tambahDiagnosa');

Route::post('/handle-edit', 'App\Http\Controllers\petugasController@handleEdit');

// Post Pasien
Route::post('/buat-rm', 'App\Http\Controllers\petugasController@buatRM');

Route::post('/pasien-lama', 'App\Http\Controllers\pasienController@pasienLama');

Route::post('/pasien-baru', 'App\Http\Controllers\pasienController@pasienBaru');
