<!-- Form Pendaftaran -->
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