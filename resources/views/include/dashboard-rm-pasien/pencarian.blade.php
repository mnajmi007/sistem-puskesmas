<div class="form-pencarian-1" id="form-pencarian-1">
    <form action="#">
        <div class="d-flex mb-3">
            <div class="form-group p-2 mr-2 flex-fill">
                <label for="nama">Nama Pasien</label>
                <input type="text" class="form-control" placeholder="Cari nama pasien...">
            </div>
            <div class="form-group p-2 mr-2 flex-fill">
                <label for="nama">Rekam Medis</label>
                <input type="text" class="form-control" placeholder="Cari rekam medis...">
            </div>
            <div class="form-group p-2 mr-2 flex-fill">
                <label for="nama">Nomor KTP</label>
                <input type="text" class="form-control" placeholder="Cari no KTP...">
            </div>
            <div class="form-group p-2 mr-2 flex-fill">
                <label for="nama">Status Pasien</label>
                <select class="form-control">
                    <option value="0" selected>Pilih status...</option>
                    <option value="1">Pasien baru</option>
                    <option value="2">Pasien lama</option>
                </select>
            </div>
            <div class="form-group p-2 mr-2 flex-fill">
                <button class="btn btn-block btn-danger" id="cari-pasien" style="margin-top:30px">
                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                        <path fill="#ffffff" d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
                    </svg>
                    Cari
                </button>
            </div>
        </div>
    </form>
</div>