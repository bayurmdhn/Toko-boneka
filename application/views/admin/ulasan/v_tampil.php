    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Ulasan</li>
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
    				<h3>Ulasan</h3>
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
                  <th>ID Pembelian</th>
                  <th>ID Pelanggan</th>
                  <th>ID Produk</th>
                  <th>Tanggal Pembelian</th>
									<th>Ulasan</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($ulasan as $key => $value): ?>
					
								<tr>
									<td><?php echo $key+1; ?></td>
                  <td><?php echo $value['id_pembelian'] ?></td>
                  <td><?php echo $value['id_pelanggan'] ?></td>
                  <td><?php echo $value['id_produk'] ?></td>
                  <td><?php echo $value['tanggal_pembelian'] ?></td>
									<td><?php echo $value['ulasan'] ?></td>
									<td>
										<a href="<?php echo base_url('admin/ulasan/detail/' . $value['id_ulasan']) ?>" class="btn btn-warning btn-sm"><i class="nav-icon fas fa-arrow-right fa-fw"></i></a>
										<a href="<?php echo base_url('admin/ulansan/hapus/' . $value['id_ulasan']) ?>" class="btn btn-danger btn-sm" onclick= "return confirm('apakah yakin??')"><i class="nav-icon fas fa-trash fa-fw"></i></a>
									</td>
								</tr>
								<?php endforeach ?>
							</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>
      <!-- /.container-fluid -->
    <!-- /.content -->