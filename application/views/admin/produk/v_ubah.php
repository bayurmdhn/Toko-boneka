
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          	<a href="<?php echo base_url('admin/produk'); ?>" class="btn btn-secondary">Kembali</a>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Produk</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<section class="content">
	<div class="container">
		<div class="card">
			<div class="card-header">
				<h3>Tambah Produk</h3>
			</div>
			<div class="card-body">
				<form action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Nama_Kategori</label>
						<select class="form-control" name="id_kategori">
							<option value="">Pilih Kategori</option>
				<?php foreach ($kategori as $key => $value): ?>
							<option 
							<?php if ($value['id_kategori']==$produk['id_kategori']) {
								echo "selected";
							} ?>
							value="<?php echo $value['id_kategori'] ?>"><?php echo $value['nama_kategori'] ?></option>
				<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label>Nama Produk</label>
						<input class="form-control" type="text" name="nama_produk" value="<?php echo $produk['nama_produk']; ?>">
					</div>
					<div class="form-group">
						<label>Deskripsi Produk</label>
						<textarea class="form-control" name="deskripsi_produk"><?php echo $produk['deskripsi_produk']; ?></textarea>
					</div>
					<div class="form-group">
						<label>Harga Produk (Rp)</label>
						<input class="form-control" type="text" name="harga_produk" value="<?php echo $produk['harga_produk']; ?>">
					</div>
					<div class="form-group">
						<label>Ukuran Produk (g)</label>
						<input class="form-control" type="text" name="ukuran_produk" value="<?php echo $produk['ukuran_produk']; ?>">
					</div>
					<div class="form-group">
						<label>Berat Produk (g)</label>
						<input class="form-control" type="text" name="berat_produk" value="<?php echo $produk['berat_produk']; ?>">
					</div>
					<div class="form-group">
						<label>Stok Produk (pcs)</label>
						<input class="form-control" type="text" name="stok_produk" value="<?php echo $produk['stok_produk']; ?>">
					</div>
					<div class="form-group">
						<img class="img-responsive" src="<?php echo base_url("./assets/img/produk/$produk[foto_produk]") ?>" width="200">
					</div>
					<div class="form-group">
						<label>Foto Produk</label>
						<input class="form-control" type="file" name="foto_produk">
					</div>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</section>

	
	<hr>

