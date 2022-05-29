<div class="modal fade menu-aksi" id="menu-aksi{{ $no_rm }}">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">

                <div class="btn-modal">
                    <button class="btn close-modal close-aksi" id="{{ $no_rm }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                            <path fill="none" d="M0 0h24v24H0z"/><path fill="#fff" d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z"/>
                        </svg>
                    </button>
                </div>
                <div class="pilihan">
                    <div class="pilihan-aksi text-center">
                        <a href="#" class="edit-pasien" id="{{ $no_rm }}">Edit profil pasien</a>
                    </div>
                    <div class="pilihan-aksi text-center">
                        <a href="#" class="kunjungan-pasien" id="{{ $no_rm }}">kunjungan Pasien</a>
                    </div>
                    <div class="pilihan-aksi text-center">
                        <a href="#" class="rm-pasien" id="{{ $no_rm }}">Rekam medis Pasien</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>