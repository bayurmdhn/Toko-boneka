 <div id="email-bayu">
   <h3>Halo, <?php echo $detail['nama_pelanggan'] ?> Pesanan Anda Berhasil</h3>
   <p>Berikut detail Pesanan Anda</p>

 <table style="border-collapse: collapse;">
   <thead>
     <tr>
       <th style="border: 1px solid black; padding: 10px 20px;">No</th>
       <th style="border: 1px solid black; padding: 10px 20px;">Produk</th>
       <th style="border: 1px solid black; padding: 10px 20px;">Berat</th>
       <th style="border: 1px solid black; padding: 10px 20px;">Harga</th>
       <th style="border: 1px solid black; padding: 10px 20px;">Jumlah</th>
       <th style="border: 1px solid black; padding: 10px 20px;">Subberat</th>
       <th style="border: 1px solid black; padding: 10px 20px;">Subharga</th>
     </tr>
   </thead>
   <tbody>
    <?php foreach ($produk as $key => $value): ?>
      <?php 
      $subberat = $value['berat_produk'] * $value['jumlah_pembelian']; 
      $subharga = $value['harga_produk'] * $value['jumlah_pembelian']; 
      ?>
      <tr>
        <td style="border: 1px solid black; padding: 10px 20px;"><?php echo $key+1 ?></td>
        <td style="border: 1px solid black; padding: 10px 20px;"><?php echo $value['nama_produk'] ?></td>
        <td style="border: 1px solid black; padding: 10px 20px;"><?php echo $value['berat_produk'] ?> gr</td>
        <td style="border: 1px solid black; padding: 10px 20px;">Rp. <?php echo $value['harga_produk'] ?></td>
        <td style="border: 1px solid black; padding: 10px 20px;"><?php echo $value['jumlah_pembelian'] ?></td>
        <td style="border: 1px solid black; padding: 10px 20px;"><?php echo $subberat ?> gr</td>
        <td style="border: 1px solid black; padding: 10px 20px;">Rp. <?php echo $subharga ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
  <tfoot>
   <tr>
     <th colspan="6" style="border: 1px solid black; padding: 10px 20px;">Total Belanja</th>
     <th style="border: 1px solid black; padding: 10px 20px;">Rp. <?php echo $detail['total_belanja'] ?></th>
   </tr>
   <tr>
     <th colspan="6" style="border: 1px solid black; padding: 10px 20px;">Total Ongkir</th>
     <th style="border: 1px solid black; padding: 10px 20px;">Rp. <?php echo $detail['total_ongkir'] ?></th>
   </tr>
   <tr>
     <th colspan="6" style="border: 1px solid black; padding: 10px 20px;">Total Pembelian</th>
     <th style="border: 1px solid black; padding: 10px 20px;">Rp. <?php echo $detail['total_pembelian'] ?></th>
   </tr>
 </tfoot>
</table>

<p>Harap segera melakukan pembayaran dengan mengakses tautan berikut:</p>
<p><a target="_blank" href="<?php echo base_url('checkout/batas_pembayaran'. $detail['id_pembelian']) ?>" style="text-decoration: none; border-radius: 25px; background-color: blue; color: white; padding: 10px 20px;">Bayar Sekarang</a></p> 
</div>