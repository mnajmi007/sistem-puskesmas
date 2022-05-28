<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
    <div class="info-pasien">

        <div class="card">
            <div class="card-body">
                <div class="wrapper">
                    <div class="profil-pasien">
                        <h4 class="form-title">Informasi Profil Pasien</h4>

                        <div class="info info-nama">
                            <div class="row">
                                <div class="col">
                                    <span>Nama Pasien</span>
                                </div>
                                <div class="col">
                                    <span id="nama-pasien"><b>{{ $nama }}</b></span>
                                </div>
                            </div>
                        </div>

                        <div class="info info-lahir">
                            <div class="row">
                                <div class="col">
                                    <span>Tanggal Lahir</span>
                                </div>
                                <div class="col">
                                    <span id="lahir-pasien"><b>{{ $tgl_lahir }}</b></span>
                                </div>
                            </div>
                        </div>

                        <div class="info info-gender">
                            <div class="row">
                                <div class="col">
                                    <span>Jenis Kelamin </span>
                                </div>
                                <div class="col">
                                    <span id="gender-pasien">
                                        @if($gender == NULL)
                                            <b>-</b>
                                        @else
                                            <b>{{ $gender }}</b>
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="info info-goldar">
                            <div class="row">
                                <div class="col">
                                    <span>Golongan Darah</span>
                                </div>
                                <div class="col">
                                    <span id="goldar-pasien">
                                        @if($gol_dar == NULL)
                                            <b>-</b>
                                        @else
                                            <b>{{ $gol_dar }}</b>
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="info info-goldar">
                            <div class="row">
                                <div class="col">
                                    <span>Pekerjaan</span>
                                </div>
                                <div class="col">
                                    <span id="pekerjaan-pasien">
                                        @if($pekerjaan == NULL)
                                            <b>-</b>
                                        @else
                                            <b>{{ $pekerjaan }}</b>
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <hr class="dashed">

                    <div class="tempat-tinggal">
                        <h4 class="form-title">Informasi Profil Pasien</h4>

                        <div class="info info-alamat">
                            <div class="row">
                                <div class="col">
                                    <span>Alamat Rumah</span>
                                </div>
                                <div class="col">
                                    <span id="alamat-pasien"><b>{{ $alamat }}</b></span>
                                </div>
                            </div>
                        </div>

                        <div class="info info-ktp">
                            <div class="row">
                                <div class="col">
                                    <span>Nomor KTP</span>
                                </div>
                                <div class="col">
                                    <span id="ktp-pasien">
                                        @if($nik == NULL)
                                            <b>-</b>
                                        @else
                                            <b>{{ $nik }}</b>
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="info info-tlp">
                            <div class="row">
                                <div class="col">
                                    <span>Nomor Telepon</span>
                                </div>
                                <div class="col">
                                    <span id="tlp-pasien"><b>{{ $no_telp }}</b></span>
                                </div>
                            </div>
                        </div>

                        <div class="info info-kelurahan">
                            <div class="row">
                                <div class="col">
                                    <span>Kelurahan</span>
                                </div>
                                <div class="col">
                                    <span id="kelurahan-pasien"><b>Karangrejo</b></span>
                                </div>
                            </div>
                        </div>

                        <div class="info info-rw-rw">
                            <div class="row">
                                <div class="col">
                                    <span>RT / RW</span>
                                </div>
                                <div class="col">
                                    <span id="rt-pasien">
                                        @if($rt == NULL)
                                            <b>-</b>
                                        @else
                                            {{ $rt }}
                                        @endif
                                    </span> / 
                                    <span id="rw-pasien">
                                        @if($rw == NULL)
                                            <b>-</b>
                                        @else
                                            {{ $rw }}
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>