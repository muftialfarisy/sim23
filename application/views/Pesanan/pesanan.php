<!DOCTYPE html>
<html lang="en">

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
                            <h1>Pesanan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Pesanan</li>
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
                                    <h3 class="card-title">Tabel Pesanan</h3>
                                    <?php if ($jabatan == "admin") { ?>
                                        <button class="btn btn-success" data-toggle="modal" data-target="#modal" onclick="add()" style="float:right;">Add</button>
                                    <?php } ?>
                                    <!-- <button style="float:right;">Tambah Data User</button> -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="pesanan" class="table table-bordered table-hover" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Pelanggan</th>
                                                <th>Tema Desain</th>
                                                <th>tanggal Pesanan</th>
                                                <th>invoice</th>
                                                <th>Produk</th>
                                                <th>Jumlah</th>
                                                <th>Bahan Baku</th>
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
                                    <label>Nama Pelanggan</label>
                                    <input type="text" class="form-control" placeholder="Nama Pelanggan" name="nama_pelanggan" id="nama_pelanggan">
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Tema Desain</label>
                                        <input type="text" class="form-control" placeholder="Tema Desain" name="tema_desain" id="tema_desain">
                                    </div>
                                    <div class="form-group">
                                        <label>tanggal Pesanan</label>
                                        <input type="date" class="form-control" name="tanggal_pesanan" id="tanggal_pesanan">
                                    </div>
                                    <div class="form-group">
                                        <label>Invoice</label>
                                        <select class="form-control" id="invoice" name="invoice">
                                            <option value="lunas">Lunas</option>
                                            <option value="belum_lunas">Belum Lunas</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Produk</label>
                                        <select class="form-control" id="produk" name="produk">
                                            <option value="jersey">Jersey</option>
                                            <option value="jacket">Jacket</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>jumlah</label>
                                        <input type="number" class="form-control" placeholder="Jumlah" name="jumlah" id="jumlah">
                                    </div>
                                    <div class="form-group">
                                        <label>Bahan Baku</label>
                                        <input type="text" class="form-control" placeholder="Bahan Baku" name="bahan_baku" id="bahan_baku" onchange="input()">
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
        var readUrl = '<?php echo site_url('Pesanan_controller/read') ?>';
        var addUrl = '<?php echo site_url('Pesanan_controller/add') ?>';
        var deleteUrl = '<?php echo site_url('Pesanan_controller/delete') ?>';
        var editUrl = '<?php echo site_url('Pesanan_controller/edit') ?>';
        var getPesananUrl = '<?php echo site_url('Pesanan_controller/get_pesanan') ?>';
    </script>
    <script src="<?php echo base_url('assets/js/pesanan.js') ?>"></script>
</body>

</html>