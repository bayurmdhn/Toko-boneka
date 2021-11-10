<div class="bg-light py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <a href="cart.html">Cart</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Checkout</strong></div>
    </div>
  </div>
</div>

<div class="site-section">
  <div class="container">
    <?php if (empty($keranjang)): ?>
      <div class="alert alert-info">
        Anda belum Memasukan pembelian.
      </div>
    <?php else: ?>

      <form method="post">
      <div class="row">
        <div class="col-md-6 mb-5 mb-md-0">
          <h2 class="h3 mb-3 text-black">Data Pengiriman</h2>
          <div class="p-3 p-lg-5 border">
            <div class="form-group">
              <label class="text-black">Provinsi <span class="text-danger">*</span></label>
              <select id="pilih_provinsi" class="form-control" required>
                <option value="">Pilih Provinsi</option>  
              </select>
            </div>

            <div class="form-group">
              <label class="text-black">Kabupaten/Kota <span class="text-danger">*</span></label>
              <select id="pilih_kota" class="form-control" required>
                <option value="">Pilih Kab/Kota</option>  
              </select>
            </div>

            <div class="form-group row">
              <div class="col-md-8">
                <label class="text-black">Kecamatan <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Tulis Kecamatan" name="kecamatan_penerima" required>
              </div>
              <div class="col-md-4">
                <label class="text-black">Kode Pos</label>
                <input type="text" class="form-control" name="kodepos_penerima" required>
              </div>
            </div>

            <div class="form-group">
              <label class="text-black">Ekspedisi <span class="text-danger">*</span></label>
              <select id="pilih_ekspedisi" class="form-control" required>
                <option value="">Pilih Ekspedisi</option>  
                <option value="jne">JNE</option>  
                <option value="pos">POS Indonesia</option>  
                <option value="tiki">TIKI</option>  
              </select>
            </div>

            <div class="form-group">
              <label class="text-black">Paket <span class="text-danger">*</span></label>
              <select id="pilih_paket" class="form-control" required>
                <option value="">Pilih Paket</option>  
              </select>
            </div>

            <div class="form-group">
              <label class="text-black">Detail Alamat</label>
              <textarea  class="form-control" name="alamat_penerima"><?php echo $_SESSION['member']['alamat_pelanggan'] ?></textarea>
            </div>

            <div class="form-group">
              <label class="text-black">Catatan</label>
              <textarea name="catatan_pembelian" id="c_order_notes" cols="30" rows="5" class="form-control" placeholder="Write your notes here..."></textarea>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="row mb-5">
            <div class="col-md-12">
              <h2 class="h3 mb-3 text-black">Data Penerima</h2>
              <div class="p-3 p-lg-5 border">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label class="text-black">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="nama_penerima" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_lname" class="text-black">Nomor Hp/WA <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="telp_penerima" required>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row mb-5">
            <div class="col-md-12">
              <h2 class="h3 mb-3 text-black">Data Pembelian</h2>
              <div class="p-3 p-lg-5 border">
                <table class="table site-block-order-table mb-5">
                  <thead>
                    <th>Produk</th>
                    <th>Total</th>
                  </thead>
                  <?php $subtotal = 0; ?>
                  <?php $subberat = 0; ?>
                  <?php $total = 0; ?>
                  <?php foreach ($keranjang as $key => $value): ?>
                    <?php $subtotal = $value['harga_produk'] * $value['jumlah'] ?>
                    <?php $subberat += $value['berat_produk'] * $value['jumlah'] ?>
                    <?php $total += $subtotal; ?>
                    <tbody>
                      <tr>
                        <td><?php echo $value['nama_produk'] ?> <strong class="mx-2">x</strong><?php echo $value['jumlah'] ?></td>
                        <td>Rp <?php echo rupiah($subtotal) ?></td>
                      </tr>
                    <?php endforeach ?>
                    <tr>
                      <td class="text-black font-weight-bold"><strong>Total Keranjang</strong></td>
                      <td class="text-black">Rp <?php echo rupiah($total) ?></td>
                    </tr>
                    <tr>
                      <td class="text-black font-weight-bold"><strong>Ongkir</strong></td>
                      <td class="text-black" id="total_ongkir">Rp 0</td>
                    </tr>
                    <tr>
                      <td class="text-black font-weight-bold"><strong>Total Pembelian</strong></td>
                      <td class="text-black font-weight-bold" id="total_bayar"><strong>0</strong></td>
                    </tr>
                  </tbody>
                </table>


                <input type="text" name="nama_provinsi" placeholder="nama provinsi">
                <input type="text" name="tipe_kota" placeholder="tipe_kota">
                <input type="text" name="nama_kota" placeholder="nama kota">
                <input type="text" name="total_berat" placeholder="total berat" value="<?php echo $subberat ?>">
                <input type="text" name="nama_paket" placeholder="nama_paket">
                <input type="text" name="nama_ekspedisi" placeholder="nama_ekspedisi">
                <input type="text" name="estimasi_pengiriman" placeholder="estimasi_pengiriman">
                <input type="text" name="total_ongkir" placeholder="total_ongkir">
                <input type="text" name="total_belanja" placeholder="total_belanja" value="<?php echo $total?>">
                <input type="text" name="total_pembelian" placeholder="total_pembelian">


                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-lg py-3 btn-block">Lanjut Pembayaran</button>
                </div>

              </div>
            </div>
          </div>

        </div>
      </div>
      </form>
      
    <?php endif ?>
  </div>
</div>