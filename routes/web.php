<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pasienController;

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

Route::get('/dashboard/kunjungan', function(){
    return view('dashKunjungan');
});

Route::get('/dashboard/antrian', function(){
    return view('dashAntrian');
});

Route::get('/dashboard/poli-gigi', function(){
    return view('dashGigi');
});

Route::get('/dashboard/kia', function(){
    return view('dashKIA');
});

Route::get('/dashboard/mtbs', function(){
    return view('dashMTBS');
});

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

// Post Petugas
Route::post('/tambah-dokter', 'App\Http\Controllers\petugasController@tambahDokter');

Route::post('/tambah-tindakan', 'App\Http\Controllers\petugasController@tambahTindakan');

Route::post('/tambah-diagnosa', 'App\Http\Controllers\petugasController@tambahDiagnosa');

Route::post('/handle-edit', 'App\Http\Controllers\petugasController@handleEdit');

// Post Pasien
Route::post('/buat-rm', 'App\Http\Controllers\petugasController@buatRM');

Route::post('/pasien-lama', 'App\Http\Controllers\pasienController@pasienLama');

Route::post('/pasien-baru', 'App\Http\Controllers\pasienController@pasienBaru');
