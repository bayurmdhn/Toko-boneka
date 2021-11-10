<div class="bg-light py-3">
	<div class="container">
		<div class="row">
			<div class="col-md-12 mb-0"><a href="<?php echo base_url('utama') ?>">Home</a> 
				<span class="mx-2 mb-0">/</span><strong class="text-blue">Member</strong>
				<span class="mx-2 mb-0">/</span><strong class="text-blue">Edit Profil</strong></div>
			</div>
		</div>
	</div>  

	<div class="site-section">
		<div class="container">
			<div class="card mb-4">
				<div class="card-header">
					<h3>Edit Profil</h3>
				</div>
				<div class="card-body">
					<?php if ($this->session->flashdata('pesan')): ?>
						<div class="alert alert-warning">
							<?php echo $this->session->flashdata('pesan'); ?>
						</div>
						<?php endif ?>
						<div class="row">
							<div class="col-md-3">
								<img src="<?php echo base_url('assets/img/pelanggan/'. $pelanggan['foto_pelanggan']) ?>" alt="foto member" class="img-fluid">
							</div>
							<div class="col-md-8">
								<form method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label>Nama</label>
										<input type="text" name="nama_pelanggan" class="form-control" value="<?php echo $pelanggan['nama_pelanggan'] ?>">
									</div>
									<div class="form-group">
										<label>Email</label>
										<input type="text" name="email_pelanggan" class="form-control" value="<?php echo $pelanggan['email_pelanggan'] ?>" readonly>
									</div>
									<div class="form-group">
										<label>Password</label>
										<input type="password" name="password_pelanggan" class="form-control" value="">
										<div class="text-danger">kosongkan password jika tidak ingin dirubah</div>
									</div>
									<div class="form-group">
										<label>Alamat</label>
										<textarea class="form-control" name="alamat_pelanggan"><?php echo $pelanggan['alamat_pelanggan'] ?></textarea>
									</div>
									<div class="form-group">
										<label>Telepon</label>
										<input type="number" min="0" name="telp_pelanggan" class="form-control" value="<?php echo $pelanggan['telp_pelanggan'] ?>">
									</div>
									<div class="form-group">
										<label>Foto</label>
										<input type="file" name="foto_pelanggan" class="form-control">
									</div>
									<button type="submit" class="btn btn-primary">Simpan</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
