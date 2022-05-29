<div class="daftar-pencarian-1" id="daftar-pencarian-1">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Nama Pasien</th>
                <th>No RM</th>
                <th>Kepemilikan JKN</th>
                <th>No KTP</th>
                <th>Tanggal Daftar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $nama }}</td>
                <td>{{ $no_rm }}</td>
                <td>
                    @if($jkn == NULL)
                        <i>Data belum diperbarui</i>
                    @else
                        {{ $jkn }}
                    @endif
                </td>
                <td>{{ $nik }}</td>
                <td>{{ $tgl_daftar }}</td>
                <td>
                    <button class="btn btn-default aksi" id="{{ $no_rm }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                            <path fill="none" d="M0 0h24v24H0z"/><path fill="rgba(255,255,255,1)" d="M5 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm14 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm-7 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
                        </svg>
                    </button>
                </td>
            </tr>
            @include('include.dashboard-cari.modalAksi')
        </tbody>
    </table>
</div>