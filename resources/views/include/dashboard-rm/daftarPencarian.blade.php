@if($hitung < 1)
    <h1 class="text-center" style="margin:5rem 0 5rem 0"><b>Tidak ada rekam medis!</b></h1>
@else
<div class="daftar-pencarian-1" id="daftar-pencarian-1">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Nama Pasien</th>
                <th>No RM</th>
                <th>Poli Klinik</th>
                <th>Tanggal Kunjungan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach($ambil as $a)
            <tr>
                <td>{{ $a->nama }}</td>
                <td>{{ $a->no_rm }}</td>
                <td>{{ $a->nama_poli }}</td>
                <td>{{ $a->tgl_periksa }}</td>
                <td>
                    <a href="/dashboard/pasien/cari/rm/cetak/{{ $a->id_rm }}" class="btn btn-default aksi" id="{{ $a->id_rm }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                            <path fill="none" d="M0 0h24v24H0z"/><path fill="rgba(255,255,255,1)" d="M6 19H3a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h3V3a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v4h3a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1h-3v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-2zm0-2v-1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v1h2V9H4v8h2zM8 4v3h8V4H8zm0 13v3h8v-3H8zm-3-7h3v2H5v-2z"/>
                        </svg>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endif