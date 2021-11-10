    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
        <a href="<?php echo base_url('admin/ulasan'); ?>" class="btn btn-secondary">Kembali</a>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Detail Ulasan</li>
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
            <h3>Detail Ulasan</h3>
          </div>
          <div class="row">
  <div class="col-md-6">
    <table class="table">
        
      <tr>
        <td>ID Pembelian</td>
        <td><?php echo $ulasan['id_pembelian'] ?></td>
      </tr>
      <tr>
        <td>Nama Pelanggan</td>
        <td><?php echo $ulasan['nama_pelanggan'] ?></td>
      </tr>
      <tr>
        <td>Nama Produk</td>
        <td><?php echo $ulasan['nama_produk'] ?></td>
      </tr>
      <tr>
        <td>Tanggal Pembelian</td>
        <td><?php echo $ulasan['tanggal_pembelian'] ?></td>
      </tr>
      <tr>
        <td>Total Pembelian</td>
        <td>Rp.<?php echo number_format($ulasan['total_pembelian'])  ?></td>
      </tr>
      <tr>
        <td>Ulasan</td>
        <td><?php echo $ulasan['ulasan'] ?></td>
      </tr>
    </table>
  </div>
  <div class="col-md-6">
    <table class="table">
      <tr>
        <td>Foto Produk</td>
      </tr>
      <tr>
        <td>
         <img class="img-responsive" src="<?php echo base_url("./assets/img/produk/$ulasan[foto_produk]") ?>" width="200">
        </td>
      </tr>
    </table>
  </div>
</div>
        </div>
      </div>
    </section>
      <!-- /.container-fluid -->
    <!-- /.content -->