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
        <div class="card-header">
          <h3>Detail Pembelian</h3>
        </div>
        <div class="card-body">

         <div class="row">
           <div class="col-md-4">
             <h3>Pembelian</h3>
             <p>No :   <?php echo $detail['id_pembelian'] ?></p>
             <p>Tanggal :    <?php echo $detail['tanggal_pembelian'] ?></p>
             <p>Status :   <span class="badge badge-warning"><?php echo $detail['status_pembelian'] ?></span></p>
             <div class="alert alert-info">
               <?php if ($detail['status_pembelian']=='Pending'): ?>
                Anda belum melakukan pembayaran. Untuk lakukan pembayaran klik tombol bayar dibawah. <br>
                <a href="<?php echo base_url('checkout/batas_pembayaran/' . $detail['id_pembelian']) ?>" class="btn btn-danger">Bayar</a>
               <?php elseif ($detail['status_pembelian']=='Dikemas'): ?>
                Pembayaran diterima. Pesanan anda sedang kami kemas.
                 <?php elseif ($detail['status_pembelian']=='Kadaluarsa'): ?>
                Pembayaran tidak bisa dilakukan karena Anda tidak melakukan pembayaran sebelum batas waktu yang ditentukan. Harap lakukan pemesanan ulang.
                <?php elseif ($detail['status_pembelian']=='Dikirim'): ?>
                Pesanan Anda sudah kami kirimkan dengan nomor Resi pengiriman <b><?php echo $detail['resi_pengiriman'] ?></b>. Mohon menunggu kedatangan paket dari kami. Terima kasih!
               <?php endif ?>
             </div>
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
             <p>Alamat : <?php echo $detail["alamat_penerima"] ?>,
              <?php echo $detail["kecamatan_penerima"]; ?>, 
              <?php echo $detail["tipe_kota_penerima"]; ?>, 
              <?php echo $detail["kota_penerima"]; ?>, 
              <?php echo $detail["provinsi_penerima"]; ?>, 
              <?php echo $detail["kode_pos_penerima"]; ?>.
            </p>
             <p>Telepon : <?php echo $detail["telp_penerima"] ?></p>
            <p>
              Pengiriman : <?php echo $detail["ekspedisi_pengiriman"]; ?> (Paket  
              <?php echo $detail["paket_pengiriman"]; ?>)
            </p>
            <p>Estomasi pengiriman : <?php echo $detail["estimasi_pengiriman"]; ?> hari,</p> 
            <p class="alert alert-success">No Resi :
              <?php if (!empty($detail['resi_pengiriman']) && $detail['status_pembelian']=='Dikirim'): ?>
                <b><?php echo $detail["resi_pengiriman"]; ?></b> <a target="_blank" href="https://cekresi.com/?noresi=<?php echo $detail['resi_pengiriman'] ?>" title="Cek Resi" class="ml-2 badge  badge-danger"><i class="icon icon-search"></i></a>
              <?php else: ?>
                <b>-</b>
              <?php endif ?>
            </p> 

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
</div>
