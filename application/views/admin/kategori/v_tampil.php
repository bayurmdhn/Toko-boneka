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
    				<h3>Data Kategori</h3>
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
									<th>Nama</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($kategori as $key => $value): ?>
					
								<tr>
									<td><?php echo $key+1; ?></td>
									<td><?php echo $value['nama_kategori'] ?></td>
									<td>
										<a href="<?php echo base_url('admin/kategori/ubah/' . $value['id_kategori']) ?>" class="btn btn-success btn-sm"><i class="nav-icon fas fa-edit fa-fw"></i></a>
										<a href="<?php echo base_url('admin/kategori/hapus/' . $value['id_kategori']) ?>" class="btn btn-danger btn-sm" onclick= "return confirm('apakah yakin??')"><i class="nav-icon fas fa-trash fa-fw"></i></a>
									</td>
								</tr>
								<?php endforeach ?>
							</tbody>
    					</table>
    				</div>
    							<a href="<?php echo base_url('admin/kategori/tambah') ?>" class="btn btn-primary">Tambah Data</a>
    			</div>
    		</div>
    	</div>
    </section>
      <!-- /.container-fluid -->
    <!-- /.content -->