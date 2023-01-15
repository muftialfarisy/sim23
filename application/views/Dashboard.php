<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('includes/Header'); ?>
<?php $jabatan = $this->session->userdata('jabatan'); ?>

<link rel="stylesheet" href="<?php echo base_url('assets/') ?>dist/css/frappe-gantt.min.css">
<style>
    .gantt-container {
        width: 100%;
        margin: 0 auto;
    }
.gantt, .gantt3 {
        overflow-x: scroll;

}
    .gantt .bar {
        fill: red !important;
    }
    .gantt3 .bar {
        fill: blue !important;
    }
</style>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <?php $this->load->view('includes/Navbar'); ?>
        <title>Admin | Dashboard</title>
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
                <div class="container-fluid">
                    <?php $this->load->view('includes/Cards'); ?>
                    <?php if ($jabatan == "kepala_produksi") { ?>
                        <div class="row">
                            <h3>Gantt chart Estimasi</h3>
                            <div class="gantt-container">
                                <svg id="gantt" name="gantt">
                                </svg>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- Select order : <select id='urutan_order' name="urutan_order">
                        <option>pilih order</option>
                        <?php
                        foreach ($mesin_jaket as $mesin_jakett) {
                            echo "<option value='" . $mesin_jakett['urutan_order'] . "' >" . $mesin_jakett['urutan_order'] . "</option>";
                        }
                        ?>
                    </select>
                    <div class="row">
                        <h3>Gantt chart estimasi</h3>
                        <div class="gantt-container">
                            <svg id="gantt2" name="gantt2">
                            </svg>
                        </div>
                    </div> -->
                    <?php if ($jabatan == "kepala_produksi") { ?>
                    <div class="row">
                        <h3>Gantt chart Penjadwalan</h3>
                        <div class="gantt-container">
                            <svg id="gantt3" name="gantt3">
                            </svg>
                        </div>
                    </div>
                    <?php } ?> 
                </div>
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

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo base_url('assets/') ?>plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="<?php echo base_url('assets/') ?>plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url('assets/') ?>plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="<?php echo base_url('assets/') ?>plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?php echo base_url('assets/') ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url('assets/') ?>plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?php echo base_url('assets/') ?>plugins/moment/moment.min.js"></script>
    <script src="<?php echo base_url('assets/') ?>plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?php echo base_url('assets/') ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="<?php echo base_url('assets/') ?>plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?php echo base_url('assets/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets/') ?>dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="<?php echo base_url('assets/') ?>dist/js/demo.js"></script> -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo base_url('assets/') ?>dist/js/pages/dashboard.js"></script>
    <script src="assets/dist/js/frappe-gantt.min.js"></script>
    <script src="assets/dist/js/frappe-gantt.js.map"></script>
    <script src="<?php echo base_url('assets/js/dashboard.js') ?>"></script>
    <script>
        var readUrl = '<?php echo site_url('Dashboard_controller/read') ?>';
        var jadwalUrl = '<?php echo site_url('Dashboard_controller/jadwal') ?>';
        var orderUrl = '<?php echo site_url('Dashboard_controller/order') ?>';
        // chartt();
        // read();
    </script>


</body>

</html>