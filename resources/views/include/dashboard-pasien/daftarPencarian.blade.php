@if($count_all < 1)
<h1 class="text-center" style="margin:5rem 0 5rem 0;"><b>Tidak ada pasien!</b></h1>
@else
<div class="daftar-pencarian-1" id="daftar-pencarian-1">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Nama Pasien</th>
                <th>No RM</th>
                <th>Kepemilikan BPJS</th>
                <th>No KTP</th>
                <th>Tanggal Daftar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($get_pasien as $pasien)
                <tr>
                    <td>{{ $pasien->nama }}</td>
                    <td>{{ $pasien->no_rm }}</td>
                    @if($pasien->status_jkn == NULL)
                        <td><i>Pasien Baru</i></td>
                    @else
                        <td><i>{{ $pasien->status_jkn }}</i></td>
                    @endif

                    @if($pasien->nik == NULL)
                        <td><i>Pasien Baru</i></td>
                    @else
                        <td><i>{{ $pasien->nik }}</i></td>
                    @endif

                    <td>{{ $pasien->created_at }}</td>
                    <td>
                        <button class="btn btn-default aksi" id="{{ $pasien->no_rm }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                                <path fill="none" d="M0 0h24v24H0z"/><path fill="rgba(255,255,255,1)" d="M5 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm14 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm-7 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
                            </svg>
                        </button>
                    </td>
                </tr>
                @include('include.dashboard-pasien.modalAksi')
            @endforeach
        </tbody>
    </table>
</div>
@endif