<div class="bg-light py-3">
	<div class="container">
		<div class="row">
			<div class="col-md-12 mb-0"><a href="<?php echo base_url('utama') ?>">Home</a> 
				<span class="mx-2 mb-0">/</span><strong class="text-blue">Member</strong>
				<span class="mx-2 mb-0">/</span><strong class="text-blue">Dashboard</strong></div>
			</div>
		</div>
	</div>  

	<div class="site-section">
		<div class="container">
			<div class="card mb-4">
				<div class="card-header">
					<h3>Profil</h3>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-3">
							<img src="<?php echo base_url('./assets/img/pelanggan/'. $pelanggan['foto_pelanggan']) ?>" alt="foto member" class="img-fluid">
						</div>
						<div class="col-md-8">
							<p>Nama : <?php echo $pelanggan['nama_pelanggan'] ?></p>
							<p>Alamat : <?php echo $pelanggan['alamat_pelanggan'] ?></p>
							<p>Telp/HP : <?php echo $pelanggan['telp_pelanggan'] ?></p>
							<p>Email : <?php echo $pelanggan['email_pelanggan'] ?></p>
							<a href="<?php echo base_url('member/dashboard/edit/' . $pelanggan['id_pelanggan']) ?>" class="btn btn-info btn-sm">Edit Profil</a>
						</div>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					<h3>Riwayat Pembelian</h3>
				</div>
				<div class="card-body">
					<!-- <?php 
					echo "<pre>";
					print_r($pembelian);
					echo "</pre>";
					 ?> -->
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>No</th>
									<th>ID Pembelian</th>
									<th>Tanggal</th>
									<th>Batas Pembayaran</th>
									<th>Total Tagihan</th>
									<th>Status</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($pembelian as $key => $value): ?>
								<tr>
									<td><?php echo $key+1 ?></td>
									<td><?php echo $value['id_pembelian'] ?></td>
									<td><?php echo $value['tanggal_pembelian'] ?></td>
									<td><?php echo $value['batas_pembayaran'] ?></td>
									<td><?php echo $value['total_pembelian'] ?></td>
									<td><?php echo $value['status_pembelian'] ?></td>
									<td>
										<?php if ($value['status_pembelian']=='Dikirim' || $value['status_pembelian']=='Selesai'): ?>
											<a title="Beri Testimoni & Ulasan" data-toggle="tooltip" href="<?php echo base_url('member/dashboard/testimoni/' . $value['id_pembelian']) ?>" class="badge badge-danger btn-sm"><span class="icon icon-comment"></span></a>
										<?php endif ?>
										<?php if ($value['status_pembelian']=='Pending'): ?>
										<a title="Lakukan Pembayaran" data-toggle="tooltip" href="<?php echo base_url('checkout/batas_pembayaran/' . $value['id_pembelian']) ?>" class="badge badge-info btn-sm"><span class="icon icon-credit-card"></span></a>
										<?php elseif ($value['status_pembelian']!='Pending' && $value['status_pembelian']!='Kadaluarsa'): ?>
											<a title="Cek Pembayaran" data-toggle="tooltip" href="<?php echo base_url('member/dashboard/pembayaran/' . $value['id_pembelian']) ?>" class="badge badge-success btn-sm"><span class="icon icon-credit-card"></span></a>
										<?php endif ?>
										<a title="Lihat Detail Pembelian" data-toggle="tooltip" href="<?php echo base_url('member/dashboard/pembelian/' . $value['id_pembelian']) ?>" class="badge badge-warning btn-sm"><span class="icon icon-eye"></span></a>
									</td>
								</tr>
								<?php endforeach ?>
							</tbody>
						</table>
						
					</div>
				</div>
			</div>
		</div>
	</div>