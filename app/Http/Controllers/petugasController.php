<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\Pasien;
use DB;
use PDF;
use Session;

class petugasController extends Controller
{
    public function tambahAdmin(Request $req){
        $username = $req->username;
        $pwd = $req->pwd;
        $no = 0;
        $generate_id = "";

        // Enkripsi username
        $encryptUsername = Crypt::encryptString($username);

        // Enkripsi Password
        $encryptPwd = Crypt::encryptString($pwd);

        // Cek data petugas
        $petugas = DB::table('petugas')->where('id', '>', 0)->max('id');

        $id_petugas = ($petugas)+1;
        $generate_id = "Admin-".sprintf("%04s", $id_petugas);

        $input = DB::table('petugas')->insert([
            'id_petugas'=>$generate_id,
            'username'=>$encryptUsername,
            'pwd'=>$encryptPwd
        ]);

        if($input){
            echo"Input berhasil!";
        }
        else{
            echo"Input gagal!";
        }
    }

    public function loginPetugas(Request $req){
        $idPetugas = $req->idPetugas;
        $username = $req->username;
        $pwd = $req->pwd;

        // Mencocokan username dan password
        $petugas = DB::table('petugas')->where('id_petugas', '=', $idPetugas);
        $cari_petugas = $petugas->first();
        $count = $petugas->count();

        // Cek data login petugas
        if($count < 1){
            echo"Petugas tidak terdaftar!";
        }
        else{
            // Dekripsi data login petugas 
            $id_petugas = $cari_petugas->id_petugas;
            $decryptUsername = Crypt::decryptString($cari_petugas->username);
            $decryptPwd = Crypt::decryptString($cari_petugas->pwd);

            if($username != $decryptUsername || $pwd != $decryptPwd){
                echo"Username atau password salah!";
            }
            else{
                $session_petugas = Session::put('username', $decryptUsername);
                $session_id = Session::put('id_petugas', $id_petugas);
                echo"Berhasil";
            }
        }
    }

    public function logoutPetugas(){
        Session::flush();
        return redirect('/login-petugas');
    }

    public function tambahDokter(){
        $dokter = DB::table('dokter')->insert([
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
        ]);

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

    public function tambahPoli(){
        $poli = DB::table('poli')->insert([
            ['id_poli' => 'P-0001', 'nama_poli' => 'Poli Umum', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id_poli' => 'P-0002', 'nama_poli' => 'Poli Gigi', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id_poli' => 'P-0003', 'nama_poli' => 'Poli KIA', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id_poli' => 'P-0004', 'nama_poli' => 'Poli MTBS', 'created_at' => NOW(), 'updated_at' => NOW()]
        ]);

        if($poli){
            echo"Berhasil!";
        }
        else{
            echo"Gagal!";
        }
    }

    public function tambahPekerjaan(){
        $jobs = DB::table('pekerjaan')->insert([
            ['pekerjaan' => 'Wiraswasta', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['pekerjaan' => 'BUMN', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['pekerjaan' => 'Buruh', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['pekerjaan' => 'Tidak/Belum Bekerja', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['pekerjaan' => 'Rumah Tangga', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['pekerjaan' => 'Pelajar/Mahasiswa', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['pekerjaan' => 'Pensiunan', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['pekerjaan' => 'PNS', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['pekerjaan' => 'Polisi/TNI', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['pekerjaan' => 'Petani/Perkebunan', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['pekerjaan' => 'Perdagangan', 'created_at' => NOW(), 'updated_at' => NOW()],
        ]);

        if($jobs){
            echo"Berhasil!";
        }
        else{
            echo"Gagal!";
        }
    }

    public function tambahKelurahan(){
        $kelurahan = DB::table('kelurahan')->insert([
            ['kelurahan' => 'Bendan Duwur', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['kelurahan' => 'Bendan Ngisor', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['kelurahan' => 'Bendungan', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['kelurahan' => 'Gajahmungkur', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['kelurahan' => 'Karangrejo', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['kelurahan' => 'Lempong Sari', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['kelurahan' => 'Petompon', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['kelurahan' => 'Sampangan', 'created_at' => NOW(), 'updated_at' => NOW()],
        ]);

        if($kelurahan){
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

    public function dashPetugas(){
        $count_pasien = Pasien::all()->count();
        $count_kunjungan = DB::table('kunjungan')->count();
        $count_antrian = DB::table('kunjungan')->where('status_periksa', '=', 'Proses')->count();
        
        return view('dashPetugas',[
            'count_pasien'=>$count_pasien,
            'count_kunjungan'=>$count_kunjungan,
            'count_antrian'=>$count_antrian
        ]);
    }

    public function informasiPasien(){
        // Menghitung pasien yang memiliki JKN
        $get_anggotaJKN = Pasien::where('status_jkn','=','Anggota');
        $count_anggotaJKN = $get_anggotaJKN->count();
        
        // Menghitung pasien yang tidak memiliki JKN
        $get_nonJKN = Pasien::where('status_jkn','=','Non Anggota');
        $count_nonJKN = $get_nonJKN->count();
        
        // Menghitung pasien baru
        $get_pasienBaru = DB::table('kunjungan')->whereDate('created_at', date("Y-m-d"));
        $count_pasienBaru = $get_pasienBaru->count();

        // Menghitung pasien lama
        $get_pasienLama = DB::table('kunjungan')->where('status_pasien', '=', 'Lama');
        $count_pasienLama = $get_pasienLama->count();

        // Mengambil data pasien
        $get_pasien = DB::table('pasien')
                      ->orderBy('id', 'desc')
                      ->get();
                    //   ->paginate(5)

        // Mengambil data pekerjaan
        $get_pekerjaan = DB::table('pekerjaan')->get();

        // Menghitung jumlah keseluruhan pasien
        $count_all = Pasien::all()->count();

        return view('dashPasien',[
            'count_anggotaJKN'=>$count_anggotaJKN,
            'count_nonJKN'=>$count_nonJKN,
            'count_pasienBaru'=>$count_pasienBaru,
            'count_pasienLama'=>$count_pasienLama,
            'get_pasien'=>$get_pasien,
            'get_pekerjaan'=>$get_pekerjaan,
            'count_all'=>$count_all
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
        $alamat_domisili = $get_pasien->alamat_domisili;
        $rt_domisili = $get_pasien->rt_domisili;
        $rw_domisili = $get_pasien->rw_domisili;

        $get_kelurahan = DB::table('kelurahan')->whereNot('kelurahan', '=', $kelurahan)->get();
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
            'get_kelurahan2'=>$get_pekerjaan2,
            'alamat_domisili'=>$alamat_domisili,
            'rt_domisili'=>$rt_domisili,
            'rw_domisili'=>$rw_domisili,
            'kelurahan'=>$kelurahan
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

        $alamat_domisili = $req->alamat_domisili;
        $rt_domisili = $req->rt_domisili;
        $rw_domisili = $req->rw_domisili;
        $jkn = $req->jkn;

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
            "new_rm"=>$generate_rm,
            'alamat_domisili'=>$alamat_domisili,
            'rt_domisili'=>$rt_domisili,
            'rw_domisili'=>$rw_domisili
        );
        
        // echo json_encode($array);
        $update_pasien = DB::table('pasien')
                        ->where('no_rm','=',$rm)
                        ->update([
                            'nik'=>$ktp,
                            'no_rm'=>$generate_rm,
                            'rt'=>$rt,
                            'rw'=>$rw,
                            'kelurahan'=>$kelurahan,
                            'alamat_domisili'=>$alamat_domisili,
                            'rt_domisili'=>$rt_domisili,
                            'rw_domisili'=>$rw_domisili,
                            'pekerjaan'=>$pekerjaan,
                            'gender'=>$gender,
                            'gol_dar'=>$goldar,
                            'updated_at'=>NOW(),
                            'status_jkn'=>$jkn
                        ]);

        if($update_pasien){
            $update_rm = DB::table('rekam_medis')
                     ->where('no_rm', '=', $rm)
                     ->update([
                        'no_rm'=>$generate_rm
                     ]);
                     
            $update_kunjungan = DB::table('kunjungan')
                                ->where('no_rm', '=', $rm)
                                ->update([
                                    'no_rm'=>$generate_rm
                                ]);

            echo $generate_rm;
        }
        else{
            echo"error";
        }
    }

    public function dashCari($rm){
        // Ambil pasien
        $cari_pasien = Pasien::where('no_rm', '=', $rm) ->first();
        
        $nama = $cari_pasien->nama;
        $no_rm = $cari_pasien->no_rm;
        $jkn = $cari_pasien->status_jkn;
        $nik = $cari_pasien->nik;
        $tgl_daftar = $cari_pasien->created_at;

        // Ambil jenis pekerjaan
        $get_pekerjaan = DB::table('pekerjaan')->get();
        
        return view('cariPasien',[
            'nama'=>$nama,
            'no_rm'=>$no_rm,
            'jkn'=>$jkn,
            'nik'=>$nik,
            'tgl_daftar'=>$tgl_daftar,
            'get_pekerjaan'=>$get_pekerjaan
        ]);
    }

    public function cariKunjungan($rm){
        $hitung_kunjungan = DB::table('kunjungan')->where('no_rm', '=', $rm)->count();
        $kunjungan_pasien = DB::table('kunjungan')
                            ->join('pasien', 'kunjungan.no_rm', '=', 'pasien.no_rm')
                            ->join('poli', 'kunjungan.id_poli', '=', 'poli.id_poli')
                            ->where('kunjungan.no_rm', '=', $rm)
                            ->orderBy('tgl_kunjungan', 'desc')
                            ->get();

        $cari_pasien = Pasien::where('no_rm', '=', $rm)->first();       
        $nama = $cari_pasien->nama;

        return view('kunjunganPasien',[
            'nama'=>$nama,
            'hitung_kunjungan'=>$hitung_kunjungan,
            'kunjungan_pasien'=>$kunjungan_pasien
        ]);
    }

    public function cariRM($rm){
        $call_rm = DB::table('rekam_medis')
                  ->join('pasien','rekam_medis.no_rm', '=', 'pasien.no_rm')
                  ->join('poli', 'rekam_medis.id_poli', '=', 'poli.id_poli')
                  ->where('rekam_medis.no_rm', '=', $rm);

        $count_rm = $call_rm->count();
        $get_rm = $call_rm->get();

        return view('rmPasien',[
            'get_rm'=>$get_rm,
            'count_rm'=>$count_rm
        ]);
    }

    public function dashKunjungan(){
        $get_kunjungan = DB::table('kunjungan')
                         ->join('pasien', 'kunjungan.no_rm', '=', 'pasien.no_rm')
                         ->join('poli', 'kunjungan.id_poli', '=', 'poli.id_poli')
                         ->orderBy('kunjungan.id', 'desc')
                         ->get();

        return view('dashKunjungan',[
            'get_kunjungan'=>$get_kunjungan
        ]);
    }

    public function dashAntrian(){
        // Ambil antrian yang menunggu periksa
        $tunggu_periksa = DB::table('kunjungan')->where('status_periksa','=','Menunggu')->count();

        // Ambil antrian yang sedang periksa
        $proses_periksa = DB::table('kunjungan')->where('status_periksa','=','Proses')->count();

        $total_periksa = $tunggu_periksa + $proses_periksa;

        // Panggil tabel antrian
        $antrian = DB::table('kunjungan')->orderBy('id', 'desc');

        // hitung antrian
        $hitung_antrian = $antrian->count();

        // Ambil seluruh antrian
        $get_antrian = $get_kunjungan = DB::table('kunjungan')
                        ->join('pasien', 'kunjungan.no_rm', '=', 'pasien.no_rm')
                        ->join('poli', 'kunjungan.id_poli', '=', 'poli.id_poli')
                        ->orderBy('kunjungan.id', 'desc')
                        ->get();

        return view('dashAntrian',[
            'tunggu_periksa'=>$tunggu_periksa,
            'proses_periksa'=>$proses_periksa,
            'total_periksa'=>$total_periksa,
            'hitung_antrian'=>$hitung_antrian,
            'get_antrian'=>$get_antrian
        ]);
    }

    public function dashGigi(){
        // Panggil tabel antrian
        $antrian = DB::table('kunjungan')->where('id_poli', '=', 'P-0002')->orderBy('id', 'desc');

        // hitung antrian
        $hitung_antrian = $antrian->count();

        // Ambil seluruh antrian
        $get_antrian = $get_kunjungan = DB::table('kunjungan')
                        ->join('pasien', 'kunjungan.no_rm', '=', 'pasien.no_rm')
                        ->join('poli', 'kunjungan.id_poli', '=', 'poli.id_poli')
                        ->where('kunjungan.id_poli', '=', 'P-0002')
                        ->orderBy('kunjungan.id', 'desc')
                        ->get();

        return view('dashGigi',[
            'hitung_antrian'=>$hitung_antrian,
            'get_antrian'=>$get_antrian
        ]);
    }

    public function dashKIA(){
        // Panggil tabel antrian
        $antrian = DB::table('kunjungan')->where('id_poli', '=', 'P-0003')->orderBy('id', 'desc');

        // hitung antrian
        $hitung_antrian = $antrian->count();

        // Ambil seluruh antrian
        $get_antrian = $get_kunjungan = DB::table('kunjungan')
                        ->join('pasien', 'kunjungan.no_rm', '=', 'pasien.no_rm')
                        ->join('poli', 'kunjungan.id_poli', '=', 'poli.id_poli')
                        ->where('kunjungan.id_poli', '=', 'P-0003')
                        ->orderBy('kunjungan.id', 'desc')
                        ->get();

        return view('dashKIA',[
            'hitung_antrian'=>$hitung_antrian,
            'get_antrian'=>$get_antrian
        ]);
    }

    public function dashMTBS(){
        // Panggil tabel antrian
        $antrian = DB::table('kunjungan')->where('id_poli', '=', 'P-0004')->orderBy('id', 'desc');

        // hitung antrian
        $hitung_antrian = $antrian->count();

        // Ambil seluruh antrian
        $get_antrian = $get_kunjungan = DB::table('kunjungan')
                        ->join('pasien', 'kunjungan.no_rm', '=', 'pasien.no_rm')
                        ->join('poli', 'kunjungan.id_poli', '=', 'poli.id_poli')
                        ->where('kunjungan.id_poli', '=', 'P-0004')
                        ->orderBy('kunjungan.id', 'desc')
                        ->get();

        return view('dashMTBS',[
            'hitung_antrian'=>$hitung_antrian,
            'get_antrian'=>$get_antrian
        ]);
    }

    public function dashRM(){
        // Panggil rekam medis
        $rm_pasien = DB::table('rekam_medis')->orderBy('id','desc');

        // Hitung rekam medis
        $hitung = $rm_pasien->count();

        // Ambil rekam medis
        $ambil = DB::table('rekam_medis')
                 ->join('pasien', 'rekam_medis.no_rm', '=', 'pasien.no_rm')
                 ->join('poli', 'rekam_medis.id_poli', '=', 'poli.id_poli')
                 ->orderBy('rekam_medis.id','desc')
                 ->get();

        return view('dashRM',[
            'hitung'=>$hitung,
            'ambil'=>$ambil
        ]);
    }

    public function dashTambah(){
        // Panggil pekerjaan
        $pekerjaan = DB::table('pekerjaan')->get();
        
        // Panggil kelurahan
        $kelurahan = DB::table('kelurahan')->get();

        //Panggil Poli 
        $poli = DB::table('poli')->get();

        return view('dashTambah',[
            'pekerjaan'=>$pekerjaan,
            'kelurahan'=>$kelurahan,
            'poli'=>$poli
        ]);
    }

    public function tambahPasien(Request $req){
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

        $alamat_domisili = $req->alamat_domisili;
        $rt_domisili = $req->rt_domisili;
        $rw_domisili = $req->rw_domisili;

        $poli = $req->poli;
        $tgl_periksa = $req->tgl_periksa;

        $array = array(
            'pasien'=>$pasien,
            'lahir'=>$lahir,
            'pekerjaan'=>$pekerjaan,
            'gender'=>$gender,
            'goldar'=>$goldar,
            'telp'=>$telp,
            'ktp'=>$ktp,
            'alamat'=>$alamat,
            'kelurahan'=>$kelurahan,
            'rt'=>$rt,
            'rw'=>$rw,
            'alamat_domisili'=>$alamat_domisili,
            'rt_domisili'=>$rt_domisili,
            'rw_domisili'=>$rw_domisili,
            'poli'=>$poli,
            'tgl_periksa'=>$tgl_periksa
        );

        $get_kelurahan = DB::table('kelurahan')->where('kelurahan', '=', $kelurahan)->first();

        $id_kelurahan = $get_kelurahan->id;
        $keluarga = "01";

        // Cek Pasien
        $cek_pasien = Pasien::where('id', '>', 0)->max('id');

        $buat_id = ($cek_pasien)+1;
        $no_rm = "0".$id_kelurahan. sprintf("%04s", $buat_id). $keluarga;

        // Buat id rm 
        $cek_rm = DB::table('rekam_medis')->where('id', '>', 0)->max('id');
        $buat_id_rm = ($cek_rm)+1;

        $id_rm = "rm-".sprintf("%04s", $buat_id_rm);

        $insert_pasien = DB::table('pasien')->insert([
            'nama'=>$pasien,
            'no_rm'=>$no_rm,
            'status_jkn'=>NULL,
            'nik'=>$ktp,
            'pekerjaan'=>$pekerjaan,
            'alamat'=>$alamat,
            'rt'=>$rt,
            'rw'=>$rw,
            'kelurahan'=>$kelurahan,
            'alamat_domisili'=>$alamat_domisili,
            'rt_domisili'=>$rt_domisili,
            'rw_domisili'=>$rw_domisili,
            'no_telp'=>$telp,
            'tempat_lahir'=>NULL,
            'tgl_lahir'=>$lahir,
            'gender'=>$gender,
            'gol_dar'=>$goldar,
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);

        $insert_rm = DB::table('rekam_medis')->insert([
            'id_rm'=>$id_rm,
            'no_rm'=>$no_rm,
            'id_poli'=>$poli,
            'tgl_periksa'=>$tgl_periksa,
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);

        $insert_kunjungan = DB::table('kunjungan')->insert([
            'no_rm'=>$no_rm,
            'id_poli'=>$poli,
            'status_jkn'=>NULL,
            'status_periksa'=>'Proses',
            'status_pasien'=>'Baru',
            'tgl_kunjungan'=>$tgl_periksa,
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]); 

        if($insert_pasien){
            echo"Input berhasil!";
        }
        else{
            echo"Input gagal!";
        }
    }
}
