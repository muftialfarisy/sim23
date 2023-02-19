<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('includes/Header'); ?>
<?php $jabatan = $this->session->userdata('jabatan'); ?>


<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <?php $this->load->view('includes/preloader'); ?>


    <!-- Navbar -->
    <?php $this->load->view('includes/Navbar'); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php $this->load->view('includes/Sidebar'); ?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div style="text-align: center; border: 1px solid black; border-radius: 10px;">
          <h3>Selamat Datang</h3>
          <p>di Sistem Informasi Manajemen Produksi UMKM Sarang Tomket 23</p>
        </div>
        <hr />
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <?php $this->load->view('includes/Cards'); ?>
          <!-- Small boxes (end box) -->
          <!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <?php if ($jabatan == "kepala_produksi" || $jabatan == "operasional_produksi") { ?>
              <section class="col connectedSortable">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">
                      <!-- <i class="fas fa-chart-pie mr-1"></i> -->
                      Progress Produksi
                    </h3>
                  </div><!-- /.card-header -->
                  <div class="card-body">
                    <div class="tab-content p-0">
                      <?php $this->load->view('Progress_produksi'); ?>

                    </div>
                  </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
              </section>
            <?php } ?>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <?php if ($jabatan == "kepala_produksi") { ?>
              <section class="col-lg-5 connectedSortable">
                <div class="card card-danger">
                  <div class="card-header">
                    <h3 class="card-title">Pengunaan Bahan</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">

                    <?php $this->load->view('Chart_penggunaan_bahan'); ?>

                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card-body -->
              </section>
            <?php } ?>
            <?php if ($jabatan == "kepala_produksi") { ?>
              <section class="col-md-7 connectedSortable">
                <div class="card card-danger">
                  <div class="card-header">
                    <h3 class="card-title">Chart Progress Produksi</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">

                    <?php $this->load->view('chart_dateline'); ?>

                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card-body -->
              </section>
            <?php } ?>

          </div>
          <!-- /.container-fluid -->
      </section>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php $this->load->view('includes/Footer'); ?>


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <?php if ($jabatan == "admin"  || $jabatan == "gudang" || $jabatan == "kasir") { ?>
    <?php $this->load->view('includes/Script'); ?>
  <?php } ?>
  <script src="<?php echo base_url('assets/js/dashboard.js') ?>"></script>
  <script>
    var readUrl = '<?php echo site_url('Dashboard_controller/read') ?>';
    var jadwalUrl = '<?php echo site_url('Dashboard_controller/jadwal') ?>';
    var orderUrl = '<?php echo site_url('Dashboard_controller/order') ?>';
    var produksiUrl = '<?php echo site_url('Dashboard_controller/get_produksi') ?>';
    var tambahProduksiUrl = '<?php echo site_url('Dashboard_controller/update_produksi') ?>';
    var tambahPenggunaanBahanUrl = '<?php echo site_url('Dashboard_controller/update_penggunaan_bahan') ?>';
  </script>
</body>

</html>