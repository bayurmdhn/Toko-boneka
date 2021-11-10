    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <a href="<?php echo base_url('admin/pembelian') ?>" class="btn btn-secondary">Kembali</a>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><a href="<?php echo base_url('admin/pembelian') ?>">Pembelian</a></li>
              <li class="breadcrumb-item active">Detail Pembelian</li>
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
    				<h3>Detail Pembelian</h3>
    			</div>
    			<div class="card-body">
            <?php if ($this->session->flashdata('pesan')): ?>
              <div class="alert alert-success">
                <center>
                  <?php echo $this->session->flashdata('pesan'); ?>
                </center>
              </div>
            <?php endif ?>
            <div class="row">
             <div class="col-md-4">
               <h3>Pembelian</h3>
               <p>No :   <?php echo $detail['id_pembelian'] ?></p>
               <p>Tanggal :    <?php echo $detail['tanggal_pembelian'] ?></p>
               <p>Status :   <span class="badge badge-warning"><?php echo $detail['status_pembelian'] ?></span></p>
               <?php if ($detail['status_pembelian']!='Pending' && $detail['status_pembelian']!='Kadaluarsa'): ?>
                 <form action="" method="POST">
                  <div class="input-group">
                   <input type="text" name="resi_pengiriman" value="<?php echo $detail['resi_pengiriman'] ?>" class="form-control">
                   <div class="input-group-append">
                     <button type="submit" class="btn btn-success">Kirim Resi</button>
                   </div>
                 </div>
               </form>
             <?php endif ?>
           </div>
           <div class="col-md-4">
             <h3>Pelanggan</h3>
             <p>Nama :   <?php echo $detail["nama_pelanggan"]; ?></p>
             <p>Email :    <?php echo $detail["email_pelanggan"]; ?></p>
             <p>Telepon :    <?php echo $detail["telp_pelanggan"]; ?></p>
           </div>
           <div class="col-md-4">
             <h3>Pengiriman </h3>
             <p>Nama Penerima :   <?php echo $detail["nama_penerima"]; ?></p>
             <p>Alamat : <?php echo $detail["alamat_penerima"] ?></p>
             <p>Telepon : <?php echo $detail["telp_penerima"] ?></p>
             <p>
              <?php echo $detail["kecamatan_penerima"]; ?>, 
              <?php echo $detail["tipe_kota_penerima"]; ?>, 
              <?php echo $detail["kota_penerima"]; ?>, 
              <?php echo $detail["provinsi_penerima"]; ?>, 
              <?php echo $detail["kode_pos_penerima"]; ?>.
            </p>
            <p>
              Pengiriman : <?php echo $detail["ekspedisi_pengiriman"]; ?>, 
              <?php echo $detail["paket_pengiriman"]; ?>,
            </p>
            <p>Estomasi pengiriman : <?php echo $detail["estimasi_pengiriman"]; ?> hari,</p> 
            <p>No Resi : <?php echo $detail["resi_pengiriman"]; ?>.</p> 

          </div>
        </div>

        <?php 
            // print_r($produk);
        ?>

        <div class="table-responsive">
         <table class="table table-bordered">
           <thead>
             <tr>
               <th>No</th>
               <th>Produk</th>
               <th>Berat</th>
               <th>Harga</th>
               <th>Jumlah</th>
               <th>Subberat</th>
               <th>Subharga</th>
             </tr>
           </thead>
           <tbody>
            <?php foreach ($produk as $key => $value): ?>
              <?php 
              $subberat = $value['berat_produk'] * $value['jumlah_pembelian']; 
              $subharga = $value['harga_produk'] * $value['jumlah_pembelian']; 
              ?>
              <tr>
                <td><?php echo $key+1 ?></td>
                <td><?php echo $value['nama_produk'] ?></td>
                <td><?php echo $value['berat_produk'] ?> gr</td>
                <td>Rp. <?php echo $value['harga_produk'] ?></td>
                <td><?php echo $value['jumlah_pembelian'] ?></td>
                <td><?php echo $subberat ?> gr</td>
                <td>Rp. <?php echo $subharga ?></td>
              </tr>
            <?php endforeach ?>
          </tbody>
          <tfoot>
           <tr>
             <th colspan="6">Total Belanja</th>
             <th>Rp. <?php echo $detail['total_belanja'] ?></th>
           </tr>
           <tr>
             <th colspan="6">Total Ongkir</th>
             <th>Rp. <?php echo $detail['total_ongkir'] ?></th>
           </tr>
           <tr>
             <th colspan="6">Total Pembelian</th>
             <th>Rp. <?php echo $detail['total_pembelian'] ?></th>
           </tr>
         </tfoot>
       </table>
     </div>

   </div>
 </div>
</div>
</section>
<!-- /.container-fluid -->
    <!-- /.content -->