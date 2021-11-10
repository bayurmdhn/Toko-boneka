<!DOCTYPE html>
<html>
<head>
	<title>Cetak Laporan</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h3>Laporan Penjualan <?php echo date("F", strtotime($laporan[0]['tanggal_pembelian'])) ?></h3>
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>ID Pembelian</th>
					<th>Nama Pelanggan</th>
					<th>Tanggal Pembelian</th>
					<th>Total Pembelian</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($laporan as $key => $value): ?>
					<tr>
						<td><?php echo $key+1 ?></td>
						<td><?php echo $value['id_pembelian'] ?></td>
						<td><?php echo $value['nama_pelanggan'] ?></td>
						<td><?php echo tanggal($value['tanggal_pembelian']) ?></td>
						<td>Rp <?php echo rupiah($value['total_pembelian']) ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		<br>
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Produk</th>
					<th>Jumlah Pembelian</th>
					<th>Sisa Stok</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($laporan_produk as $key => $value): ?>
					<tr>
						<td><?php echo $key+1 ?></td>
						<td><?php echo $value['nama_produk'] ?></td>
						<td><?php echo $value['jumlah_pembelian'] ?></td>
						<td><?php echo $value['stok_produk'] ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
	<script>print()</script>
</body>
</html>