    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Kategori</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
    	<div class="container">
    		<div class="card">
    			<div class="card-header">
    				<h3>Data Produk</h3>
    			</div>
    			<div class="card-body">
    				<?php if ($this->session->flashdata('pesan')): ?>
    					<div class="alert alert-warning">
                <center>
    						<?php echo $this->session->flashdata('pesan'); ?>
                </center>
    					</div>
    				<?php endif ?>
    				<div class="table-responsive">
    					<table class="table table-bordered">
    						<thead>
								<tr>
                  <th>No</th>
									<th>Foto</th>
                  <th>Nama Produk</th>
                  <th>Deskripsi</th>
                  <th>Harga</th>
                  <th>Stok</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($produk as $key => $value): ?>
					
								<tr>
									<td><?php echo $key+1; ?></td>
									<td><img  class="img-fluid" width="100" src="<?php echo base_url('assets/img/produk/' . $value['foto_produk']) ?>"></td>
                  <td><?php echo $value['nama_produk'] ?></td>
                  <td><?php echo $value['deskripsi_produk'] ?></td>
                  <td>Rp <?php echo number_format($value['harga_produk']) ?></td>
                  <td><?php echo $value['stok_produk'] ?>pcs</td>
									<td>
                    <a href="<?php echo base_url('admin/produk/detail/' . $value['id_produk']) ?>" class="btn btn-warning btn-sm"><i class="nav-icon fas fa-arrow-right fa-fw"></i></a>
                    <a href="<?php echo base_url('admin/produk/ubah/' . $value['id_produk']) ?>" class="btn btn-success btn-sm"><i class="nav-icon fas fa-edit fa-fw"></i></a>
                    <a href="<?php echo base_url('admin/produk/hapus/' . $value['id_produk']) ?>" class="btn btn-danger btn-sm" onclick= "return confirm('apakah yakin??')"><i class="nav-icon fas fa-trash fa-fw"></i></a>
									</td>
								</tr>
								<?php endforeach ?>
							</tbody>
    					</table>
    				</div>
    							<a href="<?php echo base_url('admin/produk/tambah') ?>" class="btn btn-primary">Tambah Data</a>
    			</div>
    		</div>
    	</div>
    </section>
      <!-- /.container-fluid -->
    <!-- /.content -->