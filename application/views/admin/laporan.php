<div class="content">
	<div class="content-header">
		<h2>Laporan Penjual dan Laporan Produk</h2>
	</div>
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<form action="" method="GET">
					<label>Filter berdasarkan Bulan:</label>
					<div class="form-group row align-items-center">
						<div class="col-md-10">
							<select name="bulan" class="form-control">
								<option value="semua">Semua Bulan</option>
								<option value="1" <?php echo ($this->input->get('bulan')=='1') ? 'selected' : '' ?>>Januari</option>
								<option value="2" <?php echo ($this->input->get('bulan')=='2') ? 'selected' : '' ?>>Februari</option>
								<option value="3" <?php echo ($this->input->get('bulan')=='3') ? 'selected' : '' ?>>Maret</option>
								<option value="4">April</option>
								<option value="5">Mei</option>
								<option value="6">Juni</option>
								<option value="7">Juli</option>
								<option value="8">Agustus</option>
								<option value="9">September</option>
								<option value="10">Oktober</option>
								<option value="11">November</option>
								<option value="12">Desember</option>
							</select>
						</div>
						<div class="col-md-2">
							<button class="btn btn-primary">Cari</button>
						</div>
					</div>
				</form>
			</div>
			<div class="card-body">
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
				<br>
				<a href="<?php echo base_url("admin/laporan/cetak/$_GET[bulan]") ?>" class="btn btn-primary">Cetak</a>
			</div>
		</div>
	</div>
</div>
