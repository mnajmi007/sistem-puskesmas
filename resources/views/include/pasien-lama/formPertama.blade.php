<div class="lama-pertama" id="lama-pertama">
    <div class="form-group">
        <label>Nama Pasien</label>
        <input type="text" id="pasienLama" class="form-control" placeholder="Masukkan nama pasien..." autocomplete="off">
    </div>
    <div class="form-group">
        <label>Nomor Pasien</label>
        <input type="number" id="nmrPasien" class="form-control" placeholder="Masukkan nomor pasien...">
    </div>
    <div class="form-group">
        <label>Poli Klinik</label>
        <select id="poli" class="form-control">
            <option value="Pilih" selected>Pilih poli klinik...</option>
            <option value="Poli Umum">Poli Umum</option>
            <option value="Poli Gigi">Poli Gigi</option>
            <option value="Poli Mata">Poli Mata</option>
            <option value="KIA">KIA</option>
        </select>
        <div class="notif-poli" id="notif-kosong"></div>
    </div>
    <div class="button">
        <button type="button" class="btn btn-primary next" id="next-lama" style="background-color: #19A6D6;">Selanjutnya <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 13H4v-2h8V4l8 8-8 8z" fill="rgba(255,255,255,1)"/></svg></button>
    </div>
</div>