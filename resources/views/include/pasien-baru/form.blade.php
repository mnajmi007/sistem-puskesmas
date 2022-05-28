<!-- Form Pendaftaran -->
<div class="form-pendaftaran">
    <div class="card">
        <div class="card-body">
            <div class="wrapper">
                <h2>Form Pendaftaran Pasien</h2>
                <div class="button-group text-center">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <button class="btn btn-block pasien-baru active" id="pasien-baru">Pasien baru</button>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <button class="btn btn-block pasien-lama" id="pasien-lama">Pasien Lama</button>
                        </div>
                    </div>
                </div>
                <!-- Form Pasien Baru -->
                @include('include.pasien-baru.formBaru')

                <!-- Form Pasien lama -->
                @include('include.pasien-lama.formLama')
            </div>
        </div>
    </div>
</div>

<!-- Bukti pendaftaran online baru -->
<div class="modal fade modal-bukti" id="modal-bukti">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body">
                <div class="bukti-pendafaran">
                    <div class="tipe-pasien text-center">
                        <label><small>Pasien Baru</small></label>
                    </div>
                    <h4 id="bukti-nama"></h4>
                    <p>Screenshot bukti Pendaftaran online ini dan tunjukkan ke petugas Ketika datang ke puskesmas</p>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <label>Nomor Telepon</label>
                            <p id="bukti-telp"></p>
                        </div>
                        <div class="col-6">
                            <label>Tanggal Lahir</label>
                            <p id="bukti-lahir" style="width:80%"></p>
                        </div>
                        <div class="col-6">
                            <label>Alamat Rumah</label>
                            <p id="bukti-alamat"></p>
                        </div>
                        <div class="col-6">
                            <label>Poli Klinik</label>
                            <p id="bukti-poli"></p>
                        </div>
                        <div class="col-12">
                            <label>Tanggal Periksa</label>
                            <p id="bukti-periksa"></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Bukti pendaftaran online lama -->
<div class="modal fade modal-bukti" id="modal-bukti-lama">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body">
                <div class="bukti-pendafaran">
                    <div class="tipe-pasien text-center">
                        <label><small>Pasien Lama</small></label>
                    </div>
                    <h4 id="bukti-pasien-lama"></h4>
                    <p>Screenshot bukti Pendaftaran online ini dan tunjukkan ke petugas Ketika datang ke puskesmas</p>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <label>Rekam Medis</label>
                            <p id="bukti-rm"></p>
                        </div>
                        <div class="col-6">
                            <label>Status JKN</label>
                            <p id="bukti-jkn" style="width:80%"></p>
                        </div>
                        <div class="col-6">
                            <label>Tanggal Periksa</label>
                            <p id="bukti-periksa-lama"></p>
                        </div>
                        <div class="col-6">
                            <label>Poli Klinik</label>
                            <p id="bukti-poli-lama"></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>