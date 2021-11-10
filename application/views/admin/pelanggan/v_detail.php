    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
        <a href="<?php echo base_url('admin/pelanggan'); ?>" class="btn btn-secondary">Kembali</a>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Detail Produk</li>
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
            <h3>Detail Produk</h3>
          </div>
          <div class="row">
  <div class="col-md-6">
    <table class="table">
      <?php foreach ($pelanggan as $key => $value): ?>
        
      <tr>
        <td>Nama Pelanggan</td>
        <td><?php echo $value['nama_pelanggan'] ?></td>
      </tr><tr>
        <td>Email Pelanggan</td>
        <td><?php echo $value['email_pelanggan'] ?></td>
      </tr>
      <tr>
        <td>Password Pelanggan</td>
        <td><?php echo $value['password_pelanggan'] ?></td>
      </tr>
      <tr>
        <td>Telepon Pelanggan</td>
        <td><?php echo $value['telp_pelanggan']  ?></td>
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
         <img class="img-responsive" src="<?php echo base_url("./assets/img/pelanggan/$value[foto_pelanggan]") ?>" width="200">
      <?php endforeach ?> 
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