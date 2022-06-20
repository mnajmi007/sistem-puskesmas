<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
    <div class="tmbh-pasien">

        <div class="back" style="margin-bottom:30px">
            <button class="btn btn-back" id="to-dash">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="19" height="19">
                    <path fill="none" d="M0 0h24v24H0z"/><path fill="#fff" d="M7.828 11H20v2H7.828l5.364 5.364-1.414 1.414L4 12l7.778-7.778 1.414 1.414z"/>
                </svg>
            </button>
            Kembali ke dashboard
        </div>
        <div class="card">
            <div class="card-body">
                <div class="wrapper">
                    <div class="data-profil" id="data-profil">
                        <h4 class="form-title">Profil Pasien</h4>
                        <div class="divider"></div>
                        <form action="#">
                            <div id="notif-kosong"></div>
                            <div class="form-group">
                                <label>Nama Pasien</label>
                                <input type="text" class="form-control" id="nama" value="{{ $nama }}" placeholder="Masukkan nama pasien..." autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" class="form-control tgl-lahir" id="tgl-lahir" value="{{ $tgl_lahir }}" placeholder="Masukkan tanggal lahir...">
                            </div>
                            <div class="form-group">
                                <label>Kepemilikan JKN</label>
                                <select id="jkn" class="form-control">
                                    <option value="Pilih" selected>Pilih kepemilikan JKN...</option>
                                    <option value="Anggota">Anggota JKN</option>
                                    <option value="Non Anggota">Non JKN</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Pekerjaan</label>
                                        <select class="form-control pekerjaan" id="pekerjaan">
                                            @if($pekerjaan != NULL)
                                                <option value="{{ $pekerjaan }}" selected>{{ $pekerjaan }}</option>
                                                @foreach($get_kelurahan2 as $a)
                                                    <option value="{{ $a->pekerjaan }}">{{ $a->pekerjaan }}</option>
                                                @endforeach
                                            @else
                                                <option value="0" selected>Pilih pekerjaan...</option>
                                                @foreach($get_pekerjaan as $p)
                                                    <option value="{{ $p->pekerjaan }}">{{ $p->pekerjaan }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select class="form-control jns-kelamin" id="jns-kelamin">
                                            @if($gender == NULL)
                                                <option value="0" selected>Jenis kelamin...</option>
                                                <option value="Perempuan">Perempuan</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                            @elseif($gender == 'Laki-laki')
                                                <option value="Perempuan">Perempuan</option>
                                                <option value="Laki-laki" selected>Laki-laki</option>
                                            @else
                                                <option value="Perempuan" selected>Perempuan</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Golongan Darah</label>
                                        <select class="form-control goldar" id="goldar">
                                            @if($gol_dar == NULL)
                                                <option value="0" selected>Golongan darah...</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="O">O</option>
                                            @elseif($gol_dar == 'A')
                                                <option value="{{ $gol_dar }}" selected>{{ $gol_dar }}</option>
                                                <option value="B">B</option>
                                                <option value="O">O</option>
                                            @elseif($gol_dar == 'B')
                                                <option value="{{ $gol_dar }}" selected>{{ $gol_dar }}</option>
                                                <option value="A">A</option>
                                                <option value="O">O</option>
                                            @else
                                                <option value="{{ $gol_dar }}" selected>{{ $gol_dar }}</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="button">
                                <button type="button" class="btn btn-primary next-form" id="next-update">
                                    Selanjutnya 
                                    <i style="margin-left:5px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                            <path fill="none" d="M0 0h24v24H0z"/><path d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z" fill="rgba(255,255,255,1)"/>
                                        </svg>
                                    </i>
                                </button>
                            </div>
                        </div>

                        <div class="tempat-tinggal" id="tempat-tinggal" style="display:none">
                            <h4 class="form-title">Alamat Pasien</h4>
                            <div class="divider"></div>
                            <div id="notif-kosong"></div>
                            <div class="form-group">
                                <label>Nomor Telepon</label>
                                <input type="number" class="form-control" id="telp-pasien" value="{{ $no_telp }}" placeholder="Masukkan nomor telepon..." autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Nomor KTP</label>
                                <input type="number" class="form-control nmr-ktp" id="nmr-ktp" value="{{ $nik }}" placeholder="Masukkan nomor KTP...">
                            </div>
                            <div class="form-group">
                                <label>Alamat Rumah</label>
                                <textarea class="form-control" id="alamat" placeholder="Masukkan alamat rumah...">{{ $alamat }}</textarea>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Kelurahan</label>
                                        <select class="form-control kelurahan" id="kelurahan">
                                            <option value="{{ $kelurahan }}" selected>{{ $kelurahan }}</option>
                                            @foreach($get_kelurahan as $k)
                                                <option value="{{ $k->kelurahan }}">{{ $k->kelurahan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>RT</label>
                                        <input type="number" class="form-control rt-pasien" value="{{ $rt }}" id="rt" placeholder="RT...">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>RW</label>
                                        <input type="number" class="form-control rw-pasien" value="{{ $rw }}" id="rw" placeholder="RW...">
                                    </div>
                                </div>
                            </div>
                            <div class="button">
                                <button type="button" class="btn btn-outline-primary sebelum" id="sebelum">
                                    Sebelum
                                </button>
                                <button type="button" class="btn btn-primary next-form" id="next-domisili">
                                    Selanjutnya 
                                    <i style="margin-left:5px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                            <path fill="none" d="M0 0h24v24H0z"/><path d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z" fill="rgba(255,255,255,1)"/>
                                        </svg>
                                    </i>
                                </button>
                            </div>
                        </div>

                        <div class="tempat-tinggal" id="tempat-tinggal-domisili" style="display:none;">
                            <h4 class="form-title">Alamat Domisili</h4>
                            <div class="divider"></div>
                            <div id="notif-kosong"></div>
                            <div class="form-group">
                                <label>Alamat Rumah</label>
                                <textarea class="form-control" id="alamat_domisili" placeholder="Masukkan alamat rumah...">{{ $alamat_domisili }}</textarea>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>RT</label>
                                        <input type="number" class="form-control rt-pasien" value="{{ $rt_domisili }}" id="rt_domisili" placeholder="RT...">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>RW</label>
                                        <input type="number" class="form-control rw-pasien" value="{{ $rt_domisili }}" id="rw_domisili" placeholder="RW...">
                                    </div>
                                </div>
                            </div>
                            <div class="button">
                                <button type="button" class="btn btn-outline-primary sebelum" id="sebelum-domisili">
                                    Sebelum
                                </button>
                                <button type="button" class="btn btn-primary tambah-pasien update-pasien" id="{{$no_rm}}">
                                    Tambah sekarang 
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>