<!DOCTYPE html>
<html>
<head>
	<title>TPA Majelis Al Muhibbin - Data Hafalan</title>
</head>
<body>

	<div class="container">
		<table border="2">
			<thead style="background:#d1d1d1;">
				<tr>
                         <th>No</th>
                         <th>Nama Murid</th>
                         <th>Materi Hafalan</th>
                         <th>Tanggal Hafalan</th>
                         <th>Nilai</th>
                         <th>Nama Penyimak</th>
				</tr>
			</thead>
			<tbody>
				@php $i=1 @endphp
				@foreach($model as $value)
				<tr>
					     <td>{{ $i++ }}</td>
					     <td>{{ ucwords($value->nama) }}</td>
                         <td>{{ $value->materi_hafalan }}</td>
                         <td>{{ date('d-m-Y', strtotime($value->tanggal_hafalan)) }}</td>
                         <td>{{ $value->nilai }}</td>
                         <td>{{ $value->guru_id }}</td>
				@endforeach
			</tbody>
		</table>
	</div>
</body>
</html>