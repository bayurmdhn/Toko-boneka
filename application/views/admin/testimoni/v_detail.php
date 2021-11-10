    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
        <a href="<?php echo base_url('admin/testimoni'); ?>" class="btn btn-secondary">Kembali</a>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Detail Testimoni</li>
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
            <h3>Detail Testimoni</h3>
          </div>
          <div class="row">
  <div class="col-md-6">
    <table class="table">
        
      <tr>
        <td>ID Testimoni</td>
        <td><?php echo $testimoni['id_testimoni'] ?></td>
      </tr><tr>
        <td>ID Pembelian</td>
        <td><?php echo $testimoni['id_pembelian'] ?></td>
      </tr>
      <tr>
        <td>Nama Pelanggan</td>
        <td><?php echo $testimoni['nama_pelanggan'] ?></td>
      </tr>
      <tr>
        <td>Total Pembelian</td>
        <td>Rp.<?php echo number_format($testimoni['total_pembelian'])  ?></td>
      </tr>
      <tr>
        <td>Status Pembelian</td>
        <td><?php echo $testimoni['status_pembelian'] ?></td>
      </tr>
    </table>
  </div>
  <div class="col-md-6">
    <table class="table">
      
      <tr>
        <td>Tanggal Pembelian</td>
        <td><?php echo $testimoni['tanggal_pembelian'] ?></td>
      </tr>
      <tr>
        <td>Testimoni</td>
        <td><?php echo $testimoni['testimoni'] ?></td>
      </tr><tr>
        <td>Tanggal Testimoni</td>
        <td><?php echo $testimoni['tanggal_testimoni'] ?></td>
      </tr>
    </table>
  </div>
</div>
        </div>
      </div>
    </section>
      <!-- /.container-fluid -->
    <!-- /.content -->