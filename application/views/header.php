<!DOCTYPE html>
<html lang="en">
<head>
  <title>Toko Boneka</title>
  
    <script type="text/javascript"
    src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="SB-Mid-client-AB3tveBHvMdHkVWJ"></script>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="<?php echo base_url('assets/fonts/icomoon/style.css') ?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/magnific-popup.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/owl.carousel.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/owl.theme.default.min.css') ?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/aos.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sendiri.css') ?>">

  </head>
  <body>

    <div class="site-wrap">
      <header class="site-navbar" role="banner">
        <div class="site-navbar-top">
          <div class="container">
            <div class="row align-items-center">

              <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                <form action="" class="site-block-top-search">
                  <span class="icon icon-search2"></span>
                  <input type="text" class="form-control border-0" placeholder="Search">
                </form>
              </div>

              <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                <div class="site-logo">
                  <a href="" class="js-logo-clone"><?php echo ambil_pengaturan('logo_teks') ?></a>
                </div>
              </div>
              <?php $total_isi_keranjang = isset($_SESSION['keranjang']) ? count($_SESSION['keranjang']) : 0; ?>
              <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                <div class="site-top-icons">
                  <ul>
                   <?php if (isset($_SESSION['member'])): ?>
                    <li><a href="<?php echo base_url("member/dashboard") ?>"><span class="icon icon-person"></span> </a></li>
                    <li><a href="<?php echo base_url('member/logout') ?>"><span class="icon icon-sign-out"></span></a></li>
                    <?php else: ?>
                      <li><a href="<?php echo base_url("member/daftar") ?>"><span class="icon icon-sign-in"></span></a></li>
                      <!-- <li><a href="#"><span class="icon icon-lock-unlocked"></span></a></li> -->
                    <?php endif ?>
                    <li>
                      <a href="<?php echo base_url('keranjang') ?>" class="site-cart">
                        <span class="icon icon-shopping_cart"></span>
                        <span class="count"><?php echo $total_isi_keranjang ?></span>
                      </a>
                    </li> 
                    <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                  </ul>
                </div> 
              </div>

            </div>
          </div>
        </div> 
        <nav class="site-navigation text-right text-md-center" role="navigation">
          <div class="container">
            <ul class="site-menu js-clone-nav d-none d-md-block">
              <li class="active">
                <a href="<?php echo base_url() ?>">Home</a>
              </li>
              <li class="has-children">
                <a href="#">Kategori</a>
                <ul class="dropdown">
                  <?php foreach (tampil_kategori() as $key => $value): ?>
                    <li><a href="<?php echo base_url('kategori/detail/'. $value['id_kategori']) ?>"><?php echo $value['nama_kategori'] ?></a></li>
                  <?php endforeach ?>
                </ul>
              </li>
              <li><a href="<?php echo base_url('produk') ?>">Katalog Produk</a></li>
              <li><a href="<?php echo base_url('testimoni') ?>">Testimoni</a></li>
              <li><a href="#">Tentang</a></li>
            </ul>
          </div>
        </nav>
      </header>