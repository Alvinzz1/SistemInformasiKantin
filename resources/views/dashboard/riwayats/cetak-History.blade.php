<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Cetak Laporan Penjualan</h4>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Produk</th>
				<th>Qty</th>
				<th>Harga</th>
				<th>Tanggal Pembelian</th>
				<th>Status</th>
				
			</tr>
		</thead>
		<tbody>
			
            @foreach($riwayat as $p)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>
                    <p>{{ $p->product->name }}</p>
              </td>
              <td>
                    <p>{{ $p->qty }}</p>
              </td>
              <td>{{ $p->product->harga }}</td>
              <td>{{ $p->created_at }}</td>
              <td>{{ $p->status }}</td>
              <td></td>
            </tr>
          @endforeach
           
		</tbody>
	</table>
 
</body>
</html>