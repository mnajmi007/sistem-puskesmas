<div class="form-kedua" id="form-kedua">
    <div class="form-group">
        <label>Alamat Rumah</label>
        <textarea class="form-control" id="alamat" placeholder="Masukkan alamat rumah..."></textarea>
    </div>
    <div class="form-group">
        <label>Poli Klinik</label>
        <select id="poli" class="form-control">
            <option value="Pilih" selected>Pilih poli klinik...</option>
            @foreach($poli as $p)
                <option value="{{ $p->id_poli }}">{{ $p->nama_poli }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Tanggal Periksa</label>
        <input type="date" id="tglPeriksa" class="form-control" placeholder="Masukkan tanggal periksa...">
        <div id="notif-kosong"></div>
    </div>
    <div class="button">
        <button type="button" class="btn btn-primary daftar" id="daftar" style="background-color: #19A6D6;">Daftar sekarang</button>
    </div>
</div>