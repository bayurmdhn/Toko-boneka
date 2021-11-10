    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Cart</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
              <?php if ($this->session->flashdata('pesan')): ?>
                <div class="alert alert-warning">
                  <?php echo $this->session->flashdata('pesan'); ?>
                </div>
              <?php endif ?>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-thumbnail">Foto</th>
                    <th class="product-name">Nama Produk</th>
                    <th class="product-price">Harga</th>
                    <th class="product-quantity">Jumlah</th>
                    <th class="product-total">Total</th>
                    <th class="product-remove">Hapus</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $total = 0; ?>
                  <?php foreach ($keranjang as $key => $value): ?>
                    <?php 
                    $subtotal = $value['harga_produk'] * $value['jumlah']; 
                    $total += $subtotal;
                    ?>
                  
                  <tr>
                    <td class="product-thumbnail">
                      <img src="<?php echo base_url('assets/img/produk/'. $value['foto_produk']) ?>" alt="Image" class="img-fluid">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black"><a href="<?php echo base_url('produk/detail/'. $value['id_produk']) ?>"><?php echo $value['nama_produk'] ?></a></h2>
                    </td>
                    <td>Rp <?php echo rupiah($value['harga_produk']) ?></td>
                    <td>
                      <div class="input-group mb-3" style="max-width: 120px;">
                        <div class="input-group-prepend">
                          <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                        </div>
                        <input type="hidden" class="text-center" name="stok[<?php echo $value['id_produk'] ?>]" value="<?php echo $value['stok_produk'] ?>">
                        <input type="text" class="form-control text-center" value="<?php echo $value['jumlah'] ?>" name="jumlah[<?php echo $value['id_produk'] ?>]">
                        <div class="input-group-append">
                          <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                        </div>
                      </div>
                    </td>
                    <td>Rp <?php echo rupiah($subtotal) ?></td>
                    <td><a href="<?php echo base_url('keranjang/hapus/'. $value['id_produk']) ?>" class="btn btn-primary btn-sm">X</a></td>
                  </tr>
                  <?php endforeach ?>
                  <?php if (empty($keranjang)): ?>
                    <tr>
                      <td colspan="7">Keranjang masih kosong </td>
                    </tr>
                  <?php endif ?>
                </tbody>
              </table>
            </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-6 mb-3 mb-md-0">
                <button type="submit" class="btn btn-primary btn-sm btn-block">Update keranjang</button>
              </div>
          </form>
              <div class="col-md-6">
                <a href="<?php echo base_url('produk') ?>" class="btn btn-outline-primary btn-sm btn-block">Lanjut Belanja</a>
              </div>
            </div>
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Total Belanja</h3>
                  </div>
                </div>
                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">Total</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="h4 text-black text-uppercase">Rp <?php echo rupiah($total) ?></strong>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <a href="checkout" class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='checkout.html'">Proses ke Checkout</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>