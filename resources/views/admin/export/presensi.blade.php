<!DOCTYPE html>
<html>
<head>
	<title>TPA Majelis Al Muhibbin - Data Presensi</title>
</head>
<body>

	<div class="container">
		<table border="2">
			<thead style="background:#d1d1d1;">
				<tr>
                         <th>No</th>
                         <th>Nama</th>
                         <th>Status Sebagai</th>
                         <th>Status Presensi</th>
                         <th>Tanggal Presensi</th>
                         <th>Tanggal Izin</th>
                         <th>Kode Presensi</th>
				</tr>
			</thead>
			<tbody>
				@php $i=1 @endphp
				@foreach($model as $value)
				<tr>
					     <td>{{ $i++ }}</td>
					     <td>{{ ucwords($value->naman) }}</td>
                         <td>{{ $value->status_user }}</td>
                         <td>{{ $value->status_presensi }}</td>
                         <td>{{ date('d-m-Y', strtotime($value->tanggal_masuk)) }}</td>
                         <td>{{ date('d-m-Y', strtotime($value->tanggal_izin)) }}</td>
                         <td>{{ base64decode($value->kode_presensi) }}</td>
				@endforeach
			</tbody>
		</table>
	</div>
</body>
</html>