<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use DB;

class pasienController extends Controller
{
    public function formPasien(){
        $poli = DB::table('poli')->get();
        return view('pendaftaran',[
            'poli'=>$poli
        ]);
    }

    public function pasienBaru(Request $req){
        // Variable
        $nama = $req->nama;
        $tanggal = $req->tanggal;
        $telp = $req->telp;
        $alamat = $req->alamat;
        $poli = $req->poli;
        $periksa = $req->periksa;

        // $no_rm = "";
        $no = 1;
        $kelurahan = 00;
        $keluarga = 00;

        // Cek Pasien
        $cek_pasien = Pasien::where('id', '>', 0)->max('id');

        $buat_id = ($cek_pasien)+1;
        $no_rm = $kelurahan. sprintf("%04s", $buat_id). $keluarga;

        $pasien = array(
            "nama"=>$nama, 
            "TTL"=>$tanggal, 
            "telp"=>$telp,
            "alamat"=>$alamat,
            "poli"=>$poli,
            "periksa"=>$periksa,
            "rm"=> $no_rm
        );

        $input_pasien = Pasien::create([
            'nama'=>$nama,
            'no_rm'=>$no_rm,
            'tgl_lahir'=>$tanggal,
            'no_telp'=>$telp,
            'alamat'=>$alamat,
        ]);

        if($input_pasien){

            $input_rm = DB::table('list_no_rm')->insert([
                'no_rm'=>$no_rm
            ]);
            
            $input_kunjungan = DB::table('kunjungan')->insert([
                'no_rm'=>$no_rm,
                'id_poli'=>$poli,
                'status_periksa'=>'Proses',
                'status_pasien'=>'Baru',
                'tgl_kunjungan'=>$periksa
            ]);

            echo"Pendaftaran online berhasil!";
        }
        else{
            echo"Pendaftaran online berhasil!";
        }
    }

    public function pasienLama(Request $req){

        // Variable

        $nama = $req->nama;
        $rm = $req->rm;
        $poli = $req->poli;
        $bpjs = $req->bpjs;
        $tanggal = $req->tanggal;


        // Input to database goes here!
        $panggil_rm = Pasien::where('no_rm', $rm);
        $cek_pasien = $panggil_rm->first();
        $cek_rm = $panggil_rm->count();

        if($cek_rm < 1){
            echo"No rekam medis tidak terdaftar!";
        }
        else{
            $panggil_rm = DB::table('rekam_medis')->where('id', '>', 0)->max('id');
            $hitung_rm = DB::table('rekam_medis')->count();

            if($hitung_rm < 1){
                $id_rm = ($panggil_rm)+1;
                $generate_id_rm = "rm-0001";
            }
            else{
                $id_rm = ($panggil_rm)+1;
                $generate_id_rm = "rm-".sprintf("%04s", $id_rm);
            }

            $input_kunjungan = DB::table('kunjungan')->insert([
                'no_rm'=>$rm,
                'id_poli'=>$poli,
                'status_jkn'=>$bpjs,
                'status_periksa'=>'Proses',
                'status_pasien'=>'Lama',
                'tgl_kunjungan'=>$tanggal,
                'created_at'=>NOW(),
                'updated_at'=>NOW()
            ]);

            $input_rm = DB::table('rekam_medis')->insert([
                'id_rm'=>$generate_id_rm,
                'no_rm'=>$rm,
                'id_poli'=>$poli,
                'tgl_periksa'=>$tanggal,
                'created_at'=>NOW(),
                'updated_at'=>NOW()
            ]);

            echo"Berhasil!";
        }
    }
}
