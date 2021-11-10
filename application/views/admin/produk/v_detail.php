    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
        <a href="<?php echo base_url('admin/produk'); ?>" class="btn btn-secondary">Kembali</a>
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
        
      <tr>
        <td>Nama Kategori</td>
        <td><?php echo $produk['nama_kategori'] ?></td>
      </tr><tr>
        <td>Nama Produk</td>
        <td><?php echo $produk['nama_produk'] ?></td>
      </tr>
      <tr>
        <td>Deskripsi Produk</td>
        <td><?php echo $produk['deskripsi_produk'] ?></td>
      </tr>
      <tr>
        <td>Harga Produk</td>
        <td>Rp.<?php echo number_format($produk['harga_produk'])  ?></td>
      </tr>
      <tr>
        <td>Ukuran Produk</td>
        <td><?php echo $produk['ukuran_produk'] ?>cm</td>
      </tr>
      <tr>
        <td>Berat Produk</td>
        <td><?php echo $produk['berat_produk'] ?>g</td>
      </tr>
      <tr>
        <td>Stok Produk</td>
        <td><?php echo $produk['stok_produk'] ?>pcs</td>
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
         <img class="img-responsive" src="<?php echo base_url("./assets/img/produk/$produk[foto_produk]") ?>" width="200">
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