    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Katalog Produk</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">

        <div class="row mb-5">
          <div class="col-md-9 order-2">
            
            <div class="row mb-5">
            <?php foreach ($produk as $key => $value): ?>
              <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                <div class="block-4 text-center border">
                  <figure class="block-4-image">
                    <a href="<?php echo base_url('produk/detail/'. $value['id_produk']) ?>"><img src="<?php echo base_url('./assets/img/produk/' . $value['foto_produk']) ?>" alt="Image placeholder" class="img-fluid foto-produk"></a>
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="<?php echo base_url('produk/detail/' . $value['id_produk']) ?>"></a><?php echo $value['nama_produk']; ?></h3>
                    <p class="text-primary font-weight-bold">Rp <?php echo rupiah($value['harga_produk'])  ?></p>
                    <a href="<?php echo base_url('produk/detail/' . $value['id_produk']) ?>" class="btn btn-primary btn-sm">Detail Produk</a>
                  </div>
                </div>
              </div>
            <?php endforeach ?>
            </div>

            <div class="row" data-aos="fade-up">
              <div class="col-md-12 text-center">
                <div class="site-block-27">
                  <ul>
                    <li><a href="#">&lt;</a></li>
                    <li class="active"><span>1</span></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&gt;</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 order-1 mb-5 mb-md-0">
            <div class="border p-4 rounded mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">Kategori</h3>
              <ul class="list-unstyled mb-0">

                <?php foreach (tampil_kategori() as $key => $value): ?>
                <li class="mb-1"><a href="<?php echo base_url('kategori/detail/'. $value['id_kategori']) ?>" class="d-flex"><span><?php echo $value['nama_kategori'] ?></span></a></li>
                <?php endforeach ?>

              </ul>
            </div>

      </div>
    </div>
