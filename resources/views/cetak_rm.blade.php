<!DOCTYPE html>
<html>
<head>
	<title>Laporan PDF Pasien</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 7pt;
		}
	</style>
	<p><small>NO RM: {{ $no_rm }}</small></p>
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>ID</th>
				<th>No RM</th>
				<th>Dokter</th>
				<th>Poli</th>
                <th>Subjective</th>
				<th>Objective</th>
                <th>Diagnosa</th>
				<th>Tindakan</th>
				<th>Tanggal Periksa</th>
			</tr>
		</thead>
		<tbody>
			@foreach($get_rm as $p)
			<tr>
				<td>{{$p->id_rm}}</td>
				<td>{{$p->no_rm}}</td>
				<td>{{$p->nama_dokter}}</td>
				<td>{{$p->nama_poli}}</td>
				<td>{{$p->subjective}}</td>
				<td>
                    <p>Kesadaran: {{$p->kesadaran}}</p>
                    <p>BB / TB: <span>{{$p->bb}}</span> / <span>{{$p->tb}}</span></p>
                    <p>Tekanan Darah: {{$p->tekanan_darah}}</p>
                    <p>Tekanan Jantung: {{$p->tekanan_darah}}</p>
                </td>
                <td>
                <?php
				$no_rm = $p->id_rm;
				$get_diagnosa = DB::table('diagnosa_pasien')
								->join('diagnosa', 'diagnosa_pasien.id_diagnosa', '=', 'diagnosa.id_diagnosa')
								->where('id_rm','=',$no_rm)
								->get();
				foreach($get_diagnosa as $d){
				?>
					<p>{{ $d->diagnosa }}</p>
				<?php
				}
				?>
                </td>
				<td></td>
				<td>{{$p->tgl_periksa}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>