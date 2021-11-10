<div class="container">
	<div class="row">
		<div class="col-md-7">
			<div class="card mb-4">
				<div class="card-header">
					<h3>Daftar Member</h3>
				</div>
				<div class="card-body">
					<?php if ($this->session->flashdata('sukses')): ?>
							<div class="alert alert-success">
								<?php echo $this->session->flashdata('sukses'); ?>
							</div>
						<?php endif ?>
						<?php if ($this->session->flashdata('gagal')): ?>
							<div class="alert alert-danger">
								<?php echo $this->session->flashdata('gagal'); ?>
							</div>
						<?php endif ?>
					<form method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label>Nama <span class="text-danger">*</span> </label>
							<input type="text" name="nama_pelanggan" class="form-control">
							<?php echo form_error('nama_pelanggan', '<div class="text-danger small">', '</div>') ?>
						</div>
						<div class="form-group">
							<label>Email <span class="text-danger">*</span> </label>
							<input type="text" name="email_pelanggan" class="form-control">
							<?php echo form_error('email_pelanggan', '<div class="text-danger small">', '</div>') ?>
						</div>
						<div class="form-group">
							<label>Password <span class="text-danger">*</span> </label>
							<input type="password" name="password_pelanggan" class="form-control">
							<?php echo form_error('password_pelanggan', '<div class="text-danger small">', '</div>') ?>
						</div>
						<div class="form-group">
							<label>Telepon <span class="text-danger">*</span> </label>
							<input type="text" name="telp_pelanggan" class="form-control">
							<?php echo form_error('telp_pelanggan', '<div class="text-danger small">', '</div>') ?>
						</div>
						<div class="form-group">
							<label>Foto</label>
							<input type="file" name="foto_pelanggan" class="form-control">
						</div>
						<button class="btn btn-info">Daftar</button>
					</form>
				</div>
				<div class="card-footer">
					<p class="text-danger">Nb : ** Silahkan Login Jika Sudah Memiliki Akun</p>
				</div>
			</div>
		</div>
		<div class="col-md-5">
			<div class="card mb-4">
				<div class="card-header">
					<h3>Login Member</h3>
				</div>
				<div class="card-body">
					<form method="post" enctype="multipart/form-data" action="<?php echo base_url("member/login") ?>">
						<div class="form-group">
							<label>Email </label>
							<input type="text" required="" name="email_pelanggan" class="form-control">
						</div>
						<div class="form-group">
							<label>Password </label>
							<input type="password" required="" name="password_pelanggan" class="form-control">
						</div>
						<?php if ($this->session->flashdata('gagal')): ?>
							<div class="alert alert-danger">
								<?php echo $this->session->flashdata('gagal'); ?>
							</div>
						<?php endif ?>
						<button class="btn btn-info">Login</button>
					</form>
				</div>
				<div class="card-footer">
					<p class="text-danger">Nb : ** Silahkan Daftar Jika Belum Memiliki Akun</p>
				</div>
			</div>
		</div>
	</div>
</div>