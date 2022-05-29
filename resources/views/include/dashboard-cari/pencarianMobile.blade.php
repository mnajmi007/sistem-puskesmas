<button class="btn btn-block btn-large lihat-pencarian" id="lihat-pencarian">
    Cari pasien
    <span style="margin-left:16px">
        <i>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                <path fill="none" d="M0 0h24v24H0z"/><path d="M18.031 16.617l4.283 4.282-1.415 1.415-4.282-4.283A8.96 8.96 0 0 1 11 20c-4.968 0-9-4.032-9-9s4.032-9 9-9 9 4.032 9 9a8.96 8.96 0 0 1-1.969 5.617zm-2.006-.742A6.977 6.977 0 0 0 18 11c0-3.868-3.133-7-7-7-3.868 0-7 3.132-7 7 0 3.867 3.132 7 7 7a6.977 6.977 0 0 0 4.875-1.975l.15-.15z" fill="rgba(255,255,255,1)"/>
            </svg>
        </i>
    </span>
</button>

<div class="form-pencarian-2" id="form-pencarian-2">
    <form action="#">
        <div class="form-group">
            <label for="nama">Nama Pasien</label>
            <input type="text" class="form-control" placeholder="Cari nama pasien...">
        </div>
        <div class="form-group">
            <label for="nama">Rekam Medis</label>
            <input type="text" class="form-control" placeholder="Cari rekam medis...">
        </div>
        <div class="form-group">
            <label for="nama">Nomor KTP</label>
            <input type="text" class="form-control" placeholder="Cari no KTP...">
        </div>
        <div class="form-group">
            <label for="nama">Status Pasien</label>
            <select class="form-control">
                <option value="0" selected>Pilih status...</option>
                <option value="1">Pasien baru</option>
                <option value="2">Pasien lama</option>
            </select>
        </div>
        <button class="btn btn-block btn-danger cari-pasien-2" id="cari-pasien-2" style="margin-top:30px">
            Cari sekarang
        </button>
    </form>
</div>