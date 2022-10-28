<!DOCTYPE html>
<html>
<head>
	<title>TPA Majelis Al Muhibbin - Data Pembayaran</title>
</head>
<body>

	<div class="container">
		<table border="2">
			<thead style="background:#d1d1d1;">
				<tr>
                         <th>No</th>
                         <th>Nama Murid</th>
                         <th>Nomor HP</th>
                         <th>Jumlah</th>
                         <th>Nomor Rekening</th>
                         <th>Pembayaran Untuk</th>
                         <th>Status</th>
				</tr>
			</thead>
			<tbody>
				@php $i=1 @endphp
				@foreach($model as $value)
				<tr>
					     <td>{{ $i++ }}</td>
					     <td>{{ ucwords($value->nama) }}</td>
                         <td>{{ $value->no_hp }}</td>
                         <td>{{ $value->no_rek }}</td>
                         <td>{{ $value->jumlah }}</td>
                         <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                         <td>{{ $value->jenis_pembayaran }}</td>
                         <td>{{ $value->status }}</td>
				@endforeach
			</tbody>
		</table>
	</div>
</body>
</html>