    <footer class="site-footer border-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-5 mb-5 mb-lg-0">
            <div class="row">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Informasi Tambahan</h3>
              </div>
              <div class="col-md-5 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="<?php  echo base_url("member/daftar") ?>">Login</a></li>
                  <li><a href="<?php  echo base_url("member/daftar") ?>">Daftar</a></li>
                  <li><a href="#">Cara Beli</a></li>
                  <li><a href="#">Cara Pembayaran</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-lg-4 mb-5 mb-lg-0">
            <h3 class="footer-heading mb-4">Kunjungi Kami</h3>
            <ul class="list-unstyled">
                <li class=""><i class="icon icon-instagram"> _bonekaAlka</i></li>
                <li class="phone"><i class="icon icon-facebook"> TokoBonekaAlka</i></li>
                <li class="email"><i class="icon icon-whatsapp"> 085726094652</i></li>
              </ul> 
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Kontak Kami</h3>
              <ul class="list-unstyled">
                <li class="address"><?php echo ambil_pengaturan('alamat_toko') ?></li>
                <li class="phone"><a href="tel:<?php echo ambil_pengaturan('telp_toko') ?>"><?php echo ambil_pengaturan('telp_toko') ?></a></li>
                <li class="email"><a href="mailto:<?php echo ambil_pengaturan('email_toko') ?>"><?php echo ambil_pengaturan('email_toko') ?></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script data-cfasync="false" src="<?php echo base_url('assets//cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') ?>"></script><script>document.write(new Date().getFullYear());</script> All rights reserved | </i> by <a href="https://bonekaalka.com/" class="text-primary">BonekaALKA</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
          
        </div>
      </div>
    </footer>
  </div>

  <script>
    var BASE_URL = "<?php echo base_url(); ?>"
  </script>

  <script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/jquery-ui.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/popper.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/owl.carousel.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/jquery.magnific-popup.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/aos.js') ?>"></script>

  <script src="<?php echo base_url('assets/js/main.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/checkout.js') ?>"></script>
    
  <script>
    $("[data-toggle='tooltip']").tooltip();
  </script>

  </body>
</html>