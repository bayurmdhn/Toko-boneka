<div class="bg-light py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb-0"><a href="<?php echo base_url('utama') ?>">Beranda</a> 
        <span class="mx-2 mb-0">/</span><strong class="text-blue">Member</strong>
        <span class="mx-2 mb-0">/</span><strong class="text-blue">Pembayaran</strong></div>
      </div>
    </div>
  </div>  

  <?php 
  // echo "<pre>";
  // print_r($pembayaran);
  // echo "</pre>";

  ?>

  <div class="site-section">
    <div class="container">
      <div class="card">
        <div class="card-header">
          <h3>Detail Pembayaran</h3>
        </div>
        <div class="card-body">

         <div class="row">
           <div class="col-md-6">
            <table class="table">
              <tr>
                <th width="40%">Kode Pembayaran</th>
                <td><?php echo $pembayaran->order_id ?></td>
              </tr>
              <tr>
                <th width="40%">Tanggal Bayar</th>
                <td><?php echo tanggal($pembayaran->transaction_time) ?></td>
              </tr>
              <tr>
                <th width="40%">Metode Pembayaran</th>
                <td><?php echo $pembayaran->payment_type ?></td>
              </tr>
               <tr>
                <th width="40%">Bank</th>
                <td><?php echo isset($pembayaran->va_number) ? $pembayaran->va_number[0]->bank : "Mandiri" ?></td>
              </tr>
              <tr>
                <th width="40%">Jumlah Bayar</th>
                <td>Rp <?php echo rupiah($pembayaran->gross_amount) ?></td>
              </tr>
            </table>
            <a href="<?php echo base_url('member/dashboard') ?>" class="btn btn-danger">Kembali</a>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
</div>