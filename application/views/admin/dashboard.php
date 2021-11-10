<div class="content">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    </div>
<div class="container-fluid">
        <?php if ($this->session->flashdata('sukses')): ?>
          <div class="alert alert-success">
            <?php echo $this->session->flashdata('sukses'); ?>
          </div>
        <?php endif ?>

        <?php  
        $data_login = $this->session->userdata('admin');

        ?>
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>6</h3>

                <p>Produk terlaris</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">Info selanjutnya<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>3<sup style="font-size: 20px"></sup></h3>

                <p>Testimoni</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo base_url('admin/testimoni') ?>" class="small-box-footer">Info selanjutnya<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>3</h3>

                <p>Ulasan</p>
              </div>
              <div class="icon">
                <i class="ion ion-create-sharp"></i>
              </div>
              <a href="<?php echo base_url('admin/ulasan') ?>" class="small-box-footer">Info selanjutnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable"></section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable"></section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div>
      <!-- /.container-fluid -->
    </div>