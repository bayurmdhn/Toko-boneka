<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          	<a href="<?php echo base_url('admin/kategori'); ?>" class="btn btn-secondary">Kembali</a>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Ubah Kategori</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<section class="content">
	<div class="container">
		<div class="card">
			<div class="card-header">
				<h3>Ubah Kategori</h3>
			</div>
			<div class="card-body">
				<form action="" method="post">
					<div class="form-group">
						<label>Nama Kategori</label>
						<input type="text" name="nama_kategori" value="<?php echo $kategori['nama_kategori'] ?>" class="form-control">
					</div>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</form>

			</div>
		</div>
	</div>
</section>

	

