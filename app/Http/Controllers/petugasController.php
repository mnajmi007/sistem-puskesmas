<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\Pasien;
use DB;

class petugasController extends Controller
{
    public function tambahDokter(){
        $dokter = Dokter::create(
            [
                'nama_dokter' => 'Bambang Adiningrat',
                'no_telp_dokter' => '08821234567',
                'id_poli' => 'P-0001'
            ],
            [
                'nama_dokter' => 'Adam Fauziah',
                'no_telp_dokter' => '08811234562',
                'id_poli' => 'P-0001'
            ],
            [
                'nama_dokter' => 'Zulham Wahyuni',
                'no_telp_dokter' => '08121234567',
                'id_poli' => 'P-0002'
            ],
            [
                'nama_dokter' => 'Teguh Salim',
                'no_telp_dokter' => '08221234567',
                'id_poli' => 'P-0002'
            ],
            [
                'nama_dokter' => 'Ririn Lestari',
                'no_telp_dokter' => '08121234562',
                'id_poli' => 'P-0003'
            ],
            [
                'nama_dokter' => 'Rahma Perdana',
                'no_telp_dokter' => '08121234569',
                'id_poli' => 'P-0003'
            ],
            [
                'nama_dokter' => 'Utami Kusuma',
                'no_telp_dokter' => '0813234562',
                'id_poli' => 'P-0004'
            ],
            [
                'nama_dokter' => 'Nurul Kusuma',
                'no_telp_dokter' => '08141234569',
                'id_poli' => 'P-0004'
            ]
        );

        if($dokter){
            echo"Berhasil!";
        }
        else{
            echo"Gagal!";
        }
    }

    public function tambahDiagnosa(){
        $diagnosa = DB::table('diagnosa')->insert([
            ['id_diagnosa' => 'K.00.1', 'id_poli' => 'P-0002', 'diagnosa' => 'Supernumerary', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id_diagnosa' => 'K.00.6', 'id_poli' => 'P-0002', 'diagnosa' => 'Persistensi gigi', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id_diagnosa' => 'K.01.0', 'id_poli' => 'P-0002', 'diagnosa' => 'Embedded', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id_diagnosa' => 'K.01.1', 'id_poli' => 'P-0002', 'diagnosa' => 'Impacted', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id_diagnosa' => 'K.02.0', 'id_poli' => 'P-0002', 'diagnosa' => 'Karies email', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id_diagnosa' => 'O116', 'id_poli' => 'P-0003', 'diagnosa' => 'Hammil ++ hypertensi', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id_diagnosa' => 'O00.9 ', 'id_poli' => 'P-0003', 'diagnosa' => 'Hamil Ektopik', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id_diagnosa' => 'O99.0 ', 'id_poli' => 'P-0003', 'diagnosa' => 'Hamil dengan anemi', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id_diagnosa' => 'O80.9 ', 'id_poli' => 'P-0003', 'diagnosa' => 'Hamil Normal', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id_diagnosa' => 'O48', 'id_poli' => 'P-0003', 'diagnosa' => 'Hammil lewat waktu', 'created_at' => NOW(), 'updated_at' => NOW()],
        ]);
    }
    public function tambahTindakan(){
        $tindakan = DB::table('tindakan')->insert([
            ['id_tindakan' => 'TD-0006', 'id_poli' => 'P-0001', 'nama_tindakan' => 'Injeksi', 'tarif_tindakan' => 10000],
            ['id_tindakan' => 'TD-0007', 'id_poli' => 'P-0001', 'nama_tindakan' => 'Skin Test', 'tarif_tindakan' => 5000],
            ['id_tindakan' => 'TD-0008', 'id_poli' => 'P-0001', 'nama_tindakan' => 'Pemasangan Oksigen', 'tarif_tindakan' => 15000],
            ['id_tindakan' => 'TD-0009', 'id_poli' => 'P-0001', 'nama_tindakan' => 'Perjahitan', 'tarif_tindakan' => 5000],
            ['id_tindakan' => 'TD-0010', 'id_poli' => 'P-0001', 'nama_tindakan' => 'Ambil Jahitan', 'tarif_tindakan' => 15000],
            ['id_tindakan' => 'TD-0011', 'id_poli' => 'P-0003', 'nama_tindakan' => 'Konsultasi Dokter', 'tarif_tindakan' => 60000],
            ['id_tindakan' => 'TD-0011', 'id_poli' => 'P-0004', 'nama_tindakan' => 'Konsultasi Dokter', 'tarif_tindakan' => 60000],
        ]);
        
        if($tindakan){
            echo"Berhasil!";
        }
        else{
            echo"Gagal!";
        }
    }

    public function buatRM(){
        $pasien = Pasien::whereRaw("no_rm = (select max('no_rm') from pasien )");
        $no = 1;
        $kelurahan = 01;
        $keluarga = 01;

        if($pasien->count() > 0){
            foreach($pasien as $p){
                $index = ($p->id)+1;
                echo"No RM:" .$kelurahan. '-' .sprintf("%04s", $index). '-' .$keluarga;
            }
        }
        else{
            echo"Pasien: 1";
            echo"<br/>";
            echo"No RM:" .$kelurahan. '-' .sprintf("%04s", $no). '-' .$keluarga;
        }
    }

    public function informasiPasien(){
        // Menghitung pasien yang memiliki JKN
        $get_anggotaJKN = Pasien::where('status_jkn','=','Anggota');
        $count_anggotaJKN = $get_anggotaJKN->count();
        
        // Menghitung pasien yang tidak memiliki JKN
        $get_nonJKN = Pasien::where('status_jkn','=','Non Anggota');
        $count_nonJKN = $get_nonJKN->count();
        
        // Menghitung pasien baru
        $get_pasienBaru = DB::table('kunjungan')->where('status_pasien', '=', 'Baru');
        $count_pasienBaru = $get_pasienBaru->count();

        // Menghitung pasien lama
        $get_pasienLama = DB::table('kunjungan')->where('status_pasien', '=', 'Lama');
        $count_pasienLama = $get_pasienLama->count();

        // Mengambil data pasien
        $get_pasien = DB::table('pasien')
                      ->orderBy('id', 'desc')
                      ->paginate(5);

        return view('dashPasien',[
            'count_anggotaJKN'=>$count_anggotaJKN,
            'count_nonJKN'=>$count_nonJKN,
            'count_pasienBaru'=>$count_pasienBaru,
            'count_pasienLama'=>$count_pasienLama,
            'get_pasien'=>$get_pasien
        ]);
    }

    public function dashEdit($id){
        $no_rm = $id;
        $get_pasien = Pasien::where('no_rm', '=', $no_rm)->first();

        $nama = $get_pasien->nama;
        $tgl_lahir = $get_pasien->tgl_lahir;
        $gender = $get_pasien->gender;
        $gol_dar = $get_pasien->gol_dar;
        $no_telp = $get_pasien->no_telp;
        $nik = $get_pasien->nik;
        $alamat = $get_pasien->alamat;
        $rt = $get_pasien->rt;
        $rw = $get_pasien->rw;
        $pekerjaan = $get_pasien->pekerjaan;
        $kelurahan = $get_pasien->kelurahan;

        $get_kelurahan = DB::table('kelurahan')->get();
        $get_pekerjaan = DB::table('pekerjaan')->get();
        $get_pekerjaan2 = DB::table('pekerjaan')->whereNot('pekerjaan', '=', $pekerjaan)->get();

        return view('dashEdit',[
            'no_rm'=>$no_rm,
            'nama'=>$nama,
            'tgl_lahir'=>$tgl_lahir,
            'gender'=>$gender,
            'gol_dar'=>$gol_dar,
            'no_telp'=>$no_telp,
            'nik'=>$nik,
            'alamat'=>$alamat,
            'get_kelurahan'=>$get_kelurahan,
            'get_pekerjaan'=>$get_pekerjaan,
            'rt'=>$rt,
            'rw'=>$rw,
            'pekerjaan'=>$pekerjaan,
            'get_kelurahan2'=>$get_pekerjaan2
        ]);
    }

    public function handleEdit(Request $req){
        $rm = $req->rm;
        $pasien = $req->pasien;
        $lahir = $req->lahir;
        $pekerjaan = $req->pekerjaan;
        $gender = $req->gender;

        $goldar = $req->goldar;
        $telp = $req->telp;
        $ktp = $req->ktp;
        $alamat = $req->alamat;
        $kelurahan = $req->kelurahan;
        $rt = $req->rt;
        $rw = $req->rw;

        // Ambil index kelurahan
        $get_kelurahan = DB::table('kelurahan')->where('kelurahan', '=', $kelurahan)->first();
        $id_kelurahan = $get_kelurahan->id;

        // Ambil index pasien
        $get_pasien = Pasien::where('no_rm', $rm)->first();
        $id_pasien = $get_pasien->id;

        // Update nomor rekam medis
        $generate_rm = "0".$id_kelurahan.sprintf("%04s",$id_pasien)."01";

        $array = array(
            "rm"=>$rm,
            "pasien"=>$pasien,
            "lahir"=>$lahir,
            "pekerjaan"=>$pekerjaan,
            "gender"=>$gender,
            "goldar"=>$goldar,
            "telp"=>$telp,
            "ktp"=>$ktp,
            "alamat"=>$alamat,
            "kelurahan"=>$kelurahan,
            "rt"=>$rt,
            "rw"=>$rw,
            "new_rm"=>$generate_rm
        );
        
        // echo json_encode($array);

        // Update data pasien
        $update_pasien = DB::table('pasien')
                         ->where('no_rm','=',$rm)
                         ->update([
                             'nama'=>$pasien,
                             'no_rm'=>$generate_rm,
                             'status_jkn'=>NULL,
                             'nik'=>$ktp,
                             'pekerjaan'=>$pekerjaan,
                             'alamat'=>$alamat,
                             'rt'=>$rt,
                             'rw'=>$rw,
                             'kelurahan'=>$kelurahan,
                             'no_telp'=>$telp,
                             'tgl_lahir'=>$lahir,
                             'gender'=>$gender,
                             'gol_dar'=>$goldar,
                             'updated_at'=>NOW()
                         ]);
        
        if($update_pasien){
            echo $generate_rm;
        }
        else{
            echo"error";
        }
    }
}
