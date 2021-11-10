<div class="bg-light py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb-0"><a href="<?php echo base_url('utama') ?>">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-blue"><?php echo $detail['nama_produk'] ?></strong></div>
    </div>
  </div>
</div>  

<div class="site-section">
  <div class="container">

    <div class="row">
      <div class="col-md-6">
        <img src="<?php echo base_url('./assets/img/produk/'. $detail['foto_produk']) ?>" alt="Image" class="img-fluid detail-foto-produk">
      </div>
      <div class="col-md-6">
        <h1 class="text-black"><?php echo $detail['nama_produk'] ?></h1>
        <h5 class="text-black">Kategori : <?php echo $detail['nama_kategori'] ?></h5>
        <p>Berat : <?php echo $detail['berat_produk'] ?>g</p>
        <p>Ukuran (tinggi) : <?php echo $detail['ukuran_produk'] ?>cm</p>
        <p>Stok : <?php echo $detail['stok_produk'] ?>pcs</p>
        <p><strong class="text-primary h4">Rp <?php echo rupiah($detail['harga_produk']) ?></strong></p>
        <form method="post">
          <div class="mb-5">
            <div class="input-group mb-3" style="max-width: 120px;">
              <div class="input-group-prepend">
                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
              </div>
              <input type="hidden" name="stok" class="text-center" value="<?php echo $detail['stok_produk'] ?>">
              <input type="text" name="jumlah" class="form-control text-center" value="1">
              <div class="input-group-append">
                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
              </div>
            </div>
            <?php if ($this->session->flashdata('pesan')): ?>
              <div class="alert alert-success">
                <center>
                  <?php echo $this->session->flashdata('pesan'); ?>
                </center>
              </div>
            <?php endif ?>
            <button type="submit" class="buy-now btn btn-sm btn-primary">Add To Cart</button>
          </div>
        </form>
        <div class="deskripsi-produk mt-3">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="deskripsi-tab" data-toggle="tab" href="#deskripsi" role="tab">Deskripsi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="ulasan-tab" data-toggle="tab" href="#ulasan" role="tab">Ulasan</a>
            </li>
          </ul>
          <div class="tab-content mt-3" id="myTabContent">
            <div class="tab-pane fade show active" id="deskripsi" role="tabpanel"><?php echo $detail['deskripsi_produk'] ?></div>
            <div class="tab-pane fade" id="ulasan" role="tabpanel">
              <ul>
                <?php foreach ($ulasan as $key => $value): ?>
                <li>
                  <h5><?php echo $value['nama_pelanggan'] ?> - <small>(<b><?php echo $value['nilai_ulasan'] ?></b>/5)</small></h5>
                  <p><?php echo $value['ulasan'] ?></p>
                </li>
                <?php endforeach ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<div class="site-section block-3 site-blocks-2 bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-7 site-section-heading text-center pt-4">
        <h2>Produk Terkait</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="nonloop-block-3 owl-carousel">
          <?php foreach ($terkait as $key => $value): ?>
            <div class="item">
              <div class="block-4 text-center">
                <figure class="block-4-image">
                  <img src="<?php echo base_url('./assets/img/produk/'. $value['foto_produk']) ?>" alt="Image placeholder" class="img-fluid" width="100">
                </figure>
                <div class="block-4-text p-4">
                  <h3><a href="<?php echo base_url('produk/tampil_detail_produk/' . $value['id_produk']) ?>"></a><?php echo $value['nama_produk']; ?></h3>
                  <p class="text-primary font-weight-bold"><?php rupiah($value['harga_produk']) ?></p>
                  <a href="<?php echo base_url('produk/tampil_detail_produk/' . $value['id_produk']) ?>" class="btn btn-primary btn-sm">Detail Produk</a>
                </div>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>
</div>