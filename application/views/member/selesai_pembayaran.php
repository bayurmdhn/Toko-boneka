<div class="bg-light py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb-0"><a href="<?php echo base_url('utama') ?>">Beranda</a> 
        <span class="mx-2 mb-0">/</span><strong class="text-blue">Member</strong>
        <span class="mx-2 mb-0">/</span><strong class="text-blue">Pembelian</strong></div>
      </div>
    </div>
  </div>  

  <div class="site-section">
    <div class="container">
      <div class="card">
       <!--  <div class="card-header">
          <h3>Detail Pembelian</h3>
        </div> -->
        <div class="card-body">
         <div class="text-center">
          <h3>Segera Lakukan Pembayaran</h3>
          <h2>ID Pembayaran : <br>
            <?php echo $pembayaran['kode_pembayaran'] ?></h2>
          <a class="btn btn-primary" href="<?php echo base_url('member/dashboard/pembelian/' . $pembayaran['id_pembayaran']) ?>">Lihat Detail Pemesanan</a>
        </div>
      </div>
    </div>
  </div>
</div>
