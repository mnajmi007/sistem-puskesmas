@if($hitung_antrian < 1)
<h1 class="text-center" style="margin:5rem 0 5rem 0;"><b>Tidak ada antrian!</b></h1>
@else
<div class="daftar-pencarian-1" id="daftar-pencarian-1">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Nama Pasien</th>
                <th>No RM</th>
                <th>Poli Klinik</th>
                <th>Tanggal Kunjungan</th>
                <th>Status Periksa</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach($get_antrian as $a)
            <tr>
                <td>{{ $a->nama }}</td>
                <td>{{ $a->no_rm }}</td>
                <td>{{ $a->nama_poli }}</td>
                <td>{{ $a->tgl_kunjungan }}</td>
                <td>{{ $a->status_periksa }}</td>
                <td>
                    <button class="btn btn-default aksi" id="{{ $a->no_rm }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                            <path fill="none" d="M0 0h24v24H0z"/><path fill="rgba(255,255,255,1)" d="M5 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm14 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm-7 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
                        </svg>
                    </button>
                </td>
            </tr>
            @include('include.dashboard-antrian.modalAksi')
        @endforeach
        </tbody>
    </table>
</div>
@endif