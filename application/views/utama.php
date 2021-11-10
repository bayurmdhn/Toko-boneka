

    <div class="site-blocks-cover" style="background-image: url(<?php echo base_url('assets/images/IMG-20190925-WA0005.jpg') ?>);" data-aos="fade">
      <div class="container">
        <div class="row align-items-start align-items-md-center justify-content-end">
          <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
            <h1 class="mb-2">Cari Boneka Kesukaanmu</h1>
            <div class="intro-text text-center text-md-left">
              <p class="mb-4">Boneka jumbo lucu dan murah. cari boneka yang anda inginkan hanya di toko boneka Alka</p>
              <p>
                <a href="<?php echo base_url('produk') ?>" class="btn btn-sm btn-primary">Shop Now</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section site-section-sm site-blocks-1">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
            <div class="icon mr-4 align-self-start">
              <img src="<?php echo base_url('./assets/img/truk.png') ?>" class="icon-utama">
            </div>
            <div class="text">
              <h2 class="text-uppercase">Pengiriman se-Indonesia</h2>
              <p>Paket pengiriman yang aman, terpercaya. Anda juga dapat menggunakan sotem COD (Cash Of Delivery), untuk daerah Yogyakarta</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
            <div class="icon mr-4 align-self-start">
              <img src="<?php echo base_url('./assets/img/sni.png') ?>" height= "40px" style="width: 40px">
            </div>
            <div class="text">
              <h2 class="text-uppercase">jaminan kualitas produk</h2>
              <p>Produk-produk kami mempunyai kualitas terbaik, dengan sertifikat SNI. aman digunakan untuk segala usia</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
            <div class="icon mr-4 align-self-start">
              <img src="<?php echo base_url('./assets/img/like.png') ?>" height= "40px" style="width: 40px">
            </div>
            <div class="text">
              <h2 class="text-uppercase">Pelayanan Terbaik</h2>
              <p>Kami akan melayani anda dengan sebaik-baiknya, karena kepuasan anda adalah prioritas kami</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section block-3 site-blocks-2 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Produk Terlaris</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="nonloop-block-3 owl-carousel">

              <?php foreach ($produk_terlaris as $key => $value): ?>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="<?php echo base_url('./assets/img/produk/'. $value['foto_produk']) ?>" alt="Image placeholder" class="img-fluid foto-produk" >
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="<?php echo base_url('produk/detail/' . $value['id_produk']) ?>"></a><?php echo $value['nama_produk']; ?></h3>
                    <p class="text-primary font-weight-bold">Rp <?php rupiah($value['harga_produk']) ?></p>
                    <a href="<?php echo base_url('produk/detail/' . $value['id_produk']) ?>" class="btn btn-primary btn-sm">Detail Produk</a>
                  </div>
                </div>
              </div>
              <?php endforeach ?>
              
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section block-8">
      <div class="container">
        <div class="site-section block-3 site-blocks-2 bg-light">
        <div class="row justify-content-center">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Produk Terbaru</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="nonloop-block-3 owl-carousel">

              <?php foreach ($produk_terlaris as $key => $value): ?>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="<?php echo base_url('./assets/img/produk/'. $value['foto_produk']) ?>" alt="Image placeholder" class="img-fluid foto-produk" >
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="<?php echo base_url('produk/detail/' . $value['id_produk']) ?>"></a><?php echo $value['nama_produk']; ?></h3>
                    <p class="text-primary font-weight-bold">Rp <?php rupiah($value['harga_produk']) ?></p>
                    <a href="<?php echo base_url('produk/detail/' . $value['id_produk']) ?>" class="btn btn-primary btn-sm">Detail Produk</a>
                  </div>
                </div>
              </div>
              <?php endforeach ?>
              
              </div>
            </div>
          </div>
      </div>
      </div>
    </div>

