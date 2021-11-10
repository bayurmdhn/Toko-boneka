<div class="content">
	<div class="content-header">
		<h2>Pengaturan</h2>
	</div>
	<div class="container-fluid">
		<?php if ($this->session->flashdata('sukses')): ?>
			<div class="alert alert-success">
				<?php echo $this->session->flashdata('sukses'); ?>
			</div>
		<?php endif ?>
		<div class="card">
			<div class="card-body">
				<form action="" method="POST">
					<div class="form-group">
						<label>Logo Teks</label>
						<input type="text" class="form-control" name="logo_teks" value="<?php echo ambil_pengaturan('logo_teks') ?>">
					</div>
					<div class="form-group">
						<label>Nama Website</label>
						<input type="text" class="form-control" name="nama_web" value="<?php echo ambil_pengaturan('nama_web') ?>">
					</div>
					<div class="form-group">
						<label>Alamat Toko</label>
						<textarea class="form-control" name="alamat_toko"><?php echo ambil_pengaturan('alamat_toko') ?></textarea>
					</div>
					<div class="form-group">
						<label>Telp. Toko</label>
						<input type="number" class="form-control" name="telp_toko" value="<?php echo ambil_pengaturan('telp_toko') ?>">
					</div>
					<div class="form-group">
						<label>Email Toko</label>
						<input type="email" class="form-control" name="email_toko" value="<?php echo ambil_pengaturan('email_toko') ?>">
					</div>
					<button type="submit" class="btn btn-primary">Simpan Pengaturan</button>
				</form>
			</div>
		</div>
	</div>
</div>
