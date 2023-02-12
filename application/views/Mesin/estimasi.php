<!DOCTYPE html>
<html lang="en">
<style>
    .gantt-container {
        width: 100%;
        margin: 0 auto;
    }

    .gantt,
    .gantt3 {
        overflow-x: scroll;

    }

    .gantt .bar {
        fill: red !important;
    }

    .gantt3 .bar {
        fill: blue !important;
    }
</style>
<?php $this->load->view('includes/Header'); ?>
<?php $jabatan = $this->session->userdata('jabatan'); ?>


<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->


        <!-- Navbar -->
        <?php $this->load->view('includes/Navbar'); ?>
        <!-- /.navbar -->

        <?php $this->load->view('includes/Sidebar'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Estimasi</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Estimasi</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Tabel Estimasi</h3>
                                    <button class="btn btn-success" data-toggle="modal" data-target="#modal" onclick="add()" style="float:right;">Add</button>
                                    <!-- <button style="float:right;">Tambah Data User</button> -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="estimasi" class="table table-bordered table-hover" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Tanggal Order</th>
                                                <th>Order</th>
                                                <th>M1 (Printer)</th>
                                                <th>M2 (Press)
                                                </th>
                                                <th>M3 (Jahit)
                                                </th>
                                                <th>M4 (Overdeck)
                                                </th>
                                                <th>M5 (Obras)
                                                </th>
                                                <th>M1 (Printer)</th>
                                                <th>M2 (Press)
                                                </th>
                                                <th>M3 (Jahit)
                                                </th>
                                                <th>M4 (Overdeck)
                                                </th>
                                                <th>M5 (Obras)
                                                </th>
                                                <th>Ci</th>
                                                <th>Dateline</th>
                                                <th>Lateness</th>
                                                <th>Nj</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->

                    <!-- gant start -->
                    <div class="container-fluid">
                        <!-- <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Gantt Chart</h3>
                                </div>
                                <div class="card-body">
                                        <div class="gantt-container">
                                <svg id="gantt" name="gantt">
                                </svg>
                            </div>
                                </div>
                                </div>
                                </div>
                                </div> -->
                        <!-- gant end -->

                        <!-- /.container-fluid -->
            </section>
            <div class="modal fade" id="modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Data</h5>
                            <button class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form name="form" id="form">
                                <input type="hidden" name="id">
                                <div class="form-group">
                                    <label>Tanggal Order</label>
                                    <input type="date" class="form-control" placeholder="Tanggal order" name="tanggal_order" id="tanggal_order">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Order</label>
                                    <?php
                                    $hasil = $this->db->select('*')
                                        ->from('estimasi')
                                        ->order_by("id", "desc")
                                        ->limit(1)
                                        ->get()
                                        ->result();
                                    $result = $this->db->get('estimasi')->num_rows();
                                    foreach ($hasil as $estimasi) {
                                        $tanggal = $estimasi->tanggal_order;
                                        $tanggal2 = date("d/m/Y", strtotime($tanggal));
                                        ?>
                                        <input type="text" class="form-control" placeholder="Tanggal order" name="tanggal_order2" id="tanggal_order2" value="<?php echo $tanggal ?>" disabled>
                                    <?php } ?>
                                </div>
                                <input type="text" class="form-control" placeholder="produk" name="produk" id="produk" disabled>
                                <div class="form-group">
                                    <label>Order</label>
                                    <select class="form-control" id="urutan_order" name="urutan_order">
                                        <option value="#">silahkan pilih order</option>

                                        <!-- <?php
                                                for ($x = 1; $x <= 10; $x++) {

                                                    ?>
                                            <option value="Order <?php echo $x ?>">Order <?php echo $x ?></option>
                                        <?php } ?> -->

                                        <?php
                                        $hasil = $this->db->select('*')
                                            ->from('mesin_sorting')
                                            ->get()
                                            ->result();
                                        $result = $this->db->get('mesin_sorting')->num_rows();
                                        foreach ($hasil as $mesin_jersey) {
                                            $urutan_order = $mesin_jersey->urutan_order;
                                            ?>
                                            <option value="<?php echo $urutan_order ?>"><?php echo  $urutan_order ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Print Sebelum</label>
                                    <input type="text" class="form-control" placeholder="Print Sebelum" name="print_sebelum" id="print_sebelum">
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Press Sebelum</label>
                                        <input type="text" class="form-control" placeholder="Press Sebelum" name="press_sebelum" id="press_sebelum">
                                    </div>
                                    <div class="form-group">
                                        <label>Jahit Sebelum</label>
                                        <input type="text" class="form-control" placeholder="Jahit Sebelum" name="jahit_sebelum" id="jahit_sebelum">
                                    </div>
                                    <div class="form-group">
                                        <label>Overdeck Sebelum</label>
                                        <input type="text" class="form-control" placeholder="Overdeck Sebelum" name="overdeck_sebelum" id="overdeck_sebelum">
                                    </div>
                                    <div class="form-group">
                                        <label>Obras Sebelum</label>
                                        <input type="text" class="form-control" placeholder="Obras Sebelum" name="obras_sebelum" id="obras_sebelum">
                                    </div>
                                    <div class="form-group">
                                        <label>Print Sesudah</label>
                                        <input type="text" class="form-control" placeholder="Print sesudah" name="print_sesudah" id="print_sesudah">
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Press sesudah</label>
                                            <input type="text" class="form-control" placeholder="Press sesudah" name="press_sesudah" id="press_sesudah">
                                        </div>
                                        <div class="form-group">
                                            <label>Jahit sesudah</label>
                                            <input type="text" class="form-control" placeholder="Jahit sesudah" name="jahit_sesudah" id="jahit_sesudah">
                                        </div>
                                        <div class="form-group">
                                            <label>Overdeck Sesudah</label>
                                            <input type="text" class="form-control" placeholder="Overdeck Sesudah" name="overdeck_sesudah" id="overdeck_sesudah">
                                        </div>
                                        <div class="form-group">
                                            <label>Obras Sesudah</label>
                                            <input type="text" class="form-control" placeholder="Obras Sesudah" name="obras_sesudah" id="obras_sesudah">
                                        </div>
                                        <input type="text" class="form-control" placeholder="total_sudah" name="total_sudah" id="total_sudah" hidden>
                                        <input type="text" class="form-control" placeholder="waktu total" name="waktu_total" id="waktu_total" hidden>
                                        <div class="form-group">
                                            <label>Ci</label>
                                            <input type="text" class="form-control" placeholder="CI" name="ci" id="ci">
                                        </div>
                                        <div class="form-group">
                                            <label>Dateline</label>
                                            <input type="text" class="form-control" placeholder="Dateline" name="dateline" id="dateline">
                                        </div>
                                        <div class="form-group">
                                            <label>Lateness</label>
                                            <input type="text" class="form-control" placeholder="Lateness" name="lateness" id="lateness">
                                        </div>
                                        <div class="form-group">
                                            <label>NJ</label>
                                            <input type="text" class="form-control" placeholder="NJ" name="nj" id="nj">
                                        </div>
                                        <button class="btn btn-success" type="submit">Add</button>
                                        <button class="btn btn-danger" data-dismiss="modal">Close</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.content -->
        </div>
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
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/plugins/datatables-rowgroup/js/dataTables.rowGroup.js"></script>
    <script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/plugins//datatables-buttons/js/buttons.print.min.js"></script>
    <script src="assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- ChartJS -->
    <script src="assets/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="assets/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="assets/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="assets/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="assets/plugins/moment/moment.min.js"></script>
    <script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="assets/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="assets/plugins//jquery-validation/jquery.validate.min.js"></script>
    <!-- <script src="assets/dist/js/demo.js"></script> -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="assets/dist/js/pages/dashboard.js"></script>
    <script src="assets/dist/js/frappe-gantt.min.js"></script>
    <script src="assets/dist/js/frappe-gantt.min.js.map"></script>
    <!-- Page specific script -->
    <!-- <script>
        $(function() {
            $('#user').DataTable({
                "destroy" : true,
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                // "bDestroy": true,
            });
        });
    </script> -->
    <script>
        var readUrl = '<?php echo site_url('Estimasi_controller/read') ?>';
        var addUrl = '<?php echo site_url('Estimasi_controller/add') ?>';
        var deleteUrl = '<?php echo site_url('Estimasi_controller/delete') ?>';
        var editUrl = '<?php echo site_url('Estimasi_controller/edit') ?>';
        var getPesananUrl = '<?php echo site_url('Estimasi_controller/get_pesanan') ?>';
        var getAllUrl = '<?php echo site_url('Estimasi_controller/get_all') ?>';
        var getAll2Url = '<?php echo site_url('Estimasi_controller/get_all2') ?>';
        var getHitungUrl = '<?php echo site_url('Estimasi_controller/get_hitung') ?>';
        var getHitung2Url = '<?php echo site_url('Estimasi_controller/get_hitung2') ?>';
        var getChart = '<?php echo site_url('Estimasi_controller/chart') ?>';
    </script>
    <script src="<?php echo base_url('assets/js/estimasi.js') ?>"></script>
</body>

</html>