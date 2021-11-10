    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pembelian</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <?php 
    // echo "<pre>";
    // print_r($pembelian);
    // echo "</pre>";

     ?>

    <!-- Main content -->
    <section class="content">
    	<div class="container">
    		<div class="card">
    			<div class="card-header">
    				<h3>Data Pembelian</h3>
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
                  <th>Tanggal</th>
									<th>Nama Pembeli</th>
                  <th>Total Pembelian</th>
                  <th>Status</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($pembelian as $key => $value): ?>
					
								<tr>
									<td><?php echo $key+1; ?></td>
                  <td><?php echo $value['tanggal_pembelian'] ?></td>
                  <td><?php echo $value['nama_pelanggan'] ?></td>
                  <td>Rp <?php echo number_format($value['total_pembelian']) ?></td>
                  <td><?php echo $value['status_pembelian'] ?></td>
									<td>
                    <a href="<?php echo base_url('admin/pembelian/detail/' . $value['id_pembelian']) ?>" class="btn btn-warning btn-sm"><i class="nav-icon fas fa-arrow-right fa-fw"></i></a>
                    <a href="<?php echo base_url('admin/pembelian/hapus/' . $value['id_pembelian']) ?>" class="btn btn-danger btn-sm" onclick= "return confirm('apakah yakin??')"><i class="nav-icon fas fa-trash fa-fw"></i></a>
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