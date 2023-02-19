<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('includes/Header'); ?>

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
                            <h1>Laporan Produksi Detail</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Laporan Produksi Detail</li>
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
                                    <h3 class="card-title">Data Laporan Produksi Detail</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card card-default">
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tanggal Order</label>
                                                    <input type="date" class="form-control" name="tanggal_order" id="tanggal_order" readonly value="<?php echo $tanggal_order ?>">
                                                </div>
                                                <!-- /.form-group -->
                                                <div class="form-group">
                                                    <label>Dateline</label>
                                                    <input type="date" class="form-control" name="dateline" id="dateline" readonly value="<?php echo $dateline ?>">
                                                </div>
                                                <!-- /.form-group -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>No.PO</label>
                                                    <input type="number" class="form-control" placeholder="No.PO" name="no_po" id="no_po" readonly value="<?php echo $no_po ?>">
                                                </div>
                                                <!-- /.form-group -->
                                                <div class="form-group">
                                                    <label>Invoice PO</label>
                                                    <input type="text" class="form-control" placeholder="Invoice PO" name="invoice_po" id="invoice_po" readonly value="<?php echo $invoice_po ?>">
                                                    <!-- /.form-group -->
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Customer</label>
                                                    <input type="text" class="form-control" placeholder="Customer" name="customer" id="customer" readonly value="<?php echo $customer ?>">
                                                </div>
                                                <!-- /.form-group -->
                                                <div class="form-group">
                                                    <label>Tema Design</label>
                                                    <input type="text" class="form-control" placeholder="Tema Design" name="tema_design" id="tema_design" readonly value="<?php echo $tema_design ?>">
                                                    <!-- /.form-group -->
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Produk</label>
                                                    <input type="text" class="form-control" placeholder="produk" name="produk" id="produk" readonly value="<?php echo $produk ?>">
                                                </div>
                                                <!-- /.form-group -->
                                                <div class="form-group">
                                                    <label>Bahan</label>
                                                    <input type="text" class="form-control" placeholder="bahan" name="bahan" id="bahan" readonly value="<?php echo $bahan ?>">
                                                    <!-- /.form-group -->
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Jumlah Produk</label>
                                                    <input type="number" class="form-control" placeholder="Jumlah Produk" name="jumlah_produk" id="jumlah_produk" readonly value="<?php echo $jumlah_produk ?>">
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <input type="text" class="form-control" placeholder="status" name="status" id="status" readonly value="<?php echo $status ?>">
                                                    <!-- /.form-group -->
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.col -->
                                            <!-- /.row -->
                                        </div>
                                        <div class="card-header">
                                            <h3 class="card-title">Progress Produksi</h3>
                                        </div><br />
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Desain</label>
                                                    <input type="text" class="form-control" placeholder="desain" name="desain" id="desain" readonly value="<?php echo $desain ?>">
                                                    <!-- /.form-group -->
                                                </div>
                                                <div class="form-group">
                                                    <label>Print</label>
                                                    <input type="text" class="form-control" placeholder="print" name="print" id="print" readonly value="<?php echo $print ?>">
                                                    <!-- /.form-group -->
                                                </div>
                                                <div class="form-group">
                                                    <label>Cutting</label>
                                                    <input type="text" class="form-control" placeholder="cutting" name="cutting" id="cutting" readonly value="<?php echo $cutting ?>">
                                                </div>
                                                <!-- /.form-group -->
                                                <div class="form-group">
                                                    <label>Press</label>
                                                    <input type="text" class="form-control" placeholder="press" name="press" id="press" readonly value="<?php echo $press ?>">
                                                    <!-- /.form-group -->
                                                </div>
                                                <div class="form-group">
                                                    <label>Jahit</label>
                                                    <input type="text" class="form-control" placeholder="jahit" name="jahit" id="jahit" readonly value="<?php echo $jahit ?>">
                                                    <!-- /.form-group -->
                                                </div>
                                                <div class="form-group">
                                                    <label>Overdeck</label>
                                                    <input type="text" class="form-control" placeholder="overdeck" name="overdeck" id="overdeck" readonly value="<?php echo $overdeck ?>">
                                                    <!-- /.form-group -->
                                                </div>
                                                <div class="form-group">
                                                    <label>Obras</label>
                                                    <input type="text" class="form-control" placeholder="obras" name="obras" id="obras" readonly value="<?php echo $obras ?>">
                                                    <!-- /.form-group -->
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Waktu Print (satuan menit)</label>
                                                    <input type="text" class="form-control" placeholder="waktu_print" name="waktu_print" id="waktu_print" readonly value="<?php echo $waktu_print ?> menit">
                                                    <!-- /.form-group -->
                                                </div>
                                                <div class="form-group">
                                                    <label>Waktu Cutting (satuan menit)</label>
                                                    <input type="text" class="form-control" placeholder="waktu_cutting" name="waktu_cutting" id="waktu_cutting" readonly value="<?php echo $waktu_cutting ?> menit">
                                                    <!-- /.form-group -->
                                                    <div class="form-group">
                                                        <label>Waktu Press (satuan menit)</label>
                                                        <input type="text" class="form-control" placeholder="waktu_press" name="waktu_press" id="waktu_press" readonly value="<?php echo $waktu_press ?> menit">
                                                        <!-- /.form-group -->
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Waktu Jahit (satuan menit)</label>
                                                        <input type="text" class="form-control" placeholder="waktu_jahit" name="waktu_jahit" id="waktu_jahit" readonly value="<?php echo $waktu_jahit ?> menit">
                                                        <!-- /.form-group -->
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Waktu Overdeck (satuan menit)</label>
                                                        <input type="text" class="form-control" placeholder="waktu_overdeck" name="waktu_overdeck" id="waktu_overdeck" readonly value="<?php echo $waktu_overdeck ?> menit">
                                                        <!-- /.form-group -->
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Waktu Obras (satuan menit)</label>
                                                        <input type="text" class="form-control" placeholder="waktu_obras" name="waktu_obras" id="waktu_obras" readonly value="<?php echo $waktu_obras ?> menit">
                                                        <!-- /.form-group -->
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>status Print</label>
                                                    <input type="text" class="form-control" placeholder="status_print" name="status_print" id="status_print" readonly value="<?php echo $status_print ?>">
                                                    <!-- /.form-group -->
                                                </div>
                                                <div class="form-group">
                                                    <label>status Cutting</label>
                                                    <input type="text" class="form-control" placeholder="status_cutting" name="status_cutting" id="status_cutting" readonly value="<?php echo $status_cutting ?>">
                                                    <!-- /.form-group -->
                                                </div>
                                                <div class="form-group">
                                                    <label>status Press</label>
                                                    <input type="text" class="form-control" placeholder="status_press" name="status_press" id="status_press" readonly value="<?php echo $status_press ?>">
                                                    <!-- /.form-group -->
                                                </div>
                                                <div class="form-group">
                                                    <label>status Jahit</label>
                                                    <input type="text" class="form-control" placeholder="status_jahit" name="status_jahit" id="status_jahit" readonly value="<?php echo $status_jahit ?>">
                                                    <!-- /.form-group -->
                                                </div>
                                                <div class="form-group">
                                                    <label>status Overdeck</label>
                                                    <input type="text" class="form-control" placeholder="status_overdeck" name="status_overdeck" id="status_overdeck" readonly value="<?php echo $status_overdeck ?>">
                                                    <!-- /.form-group -->
                                                </div>
                                                <div class="form-group">
                                                    <label>status Obras</label>
                                                    <input type="text" class="form-control" placeholder="status_obras" name="status_obras" id="status_obras" readonly value="<?php echo $status_obras ?>">
                                                    <!-- /.form-group -->
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <div class="card-header">
                                        <h3 class="card-title">Alasan (Jika Terlambat)</h3>
                                    </div><br />
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>alasan Print</label>
                                                <input type="text" class="form-control" placeholder="alasan_print" name="alasan_print" id="alasan_print" readonly value="<?php echo $alasan_print ?>">
                                                <!-- /.form-group -->
                                            </div>
                                            <div class="form-group">
                                                <label>alasan Cutting</label>
                                                <input type="text" class="form-control" placeholder="alasan_cutting" name="alasan_cutting" id="alasan_cutting" readonly value="<?php echo $alasan_cutting ?>">
                                                <!-- /.form-group -->
                                            </div>
                                            <div class="form-group">
                                                <label>alasan Press</label>
                                                <input type="text" class="form-control" placeholder="alasan_press" name="alasan_press" id="alasan_press" readonly value="<?php echo $alasan_press ?>">
                                                <!-- /.form-group -->
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>alasan Jahit</label>
                                                <input type="text" class="form-control" placeholder="alasan_jahit" name="alasan_jahit" id="alasan_jahit" readonly value="<?php echo $alasan_jahit ?>">
                                                <!-- /.form-group -->
                                            </div>
                                            <div class="form-group">
                                                <label>alasan Overdeck</label>
                                                <input type="text" class="form-control" placeholder="alasan_overdeck" name="alasan_overdeck" id="alasan_overdeck" readonly value="<?php echo $alasan_overdeck ?>">
                                                <!-- /.form-group -->
                                            </div>
                                            <div class="form-group">
                                                <label>alasan Obras</label>
                                                <input type="text" class="form-control" placeholder="alasan_obras" name="alasan_obras" id="alasan_obras" readonly value="<?php echo $alasan_obras ?>">
                                                <!-- /.form-group -->
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <!-- /.card-body -->
                                    </div>
                                    <div class="card-header">
                                        <h3 class="card-title">Quality Control (QC)</h3>
                                    </div><br />
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Desain</label>
                                                <input type="text" class="form-control" name="qc_desain" id="qc_desain" readonly value="<?php echo $qc_desain ?>">
                                            </div>
                                            <!-- /.form-group -->
                                            <div class="form-group">
                                                <label>Print</label>
                                                <input type="text" class="form-control" name="qc_print" id="qc_print" readonly value="<?php echo $qc_print ?>">
                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Cutting</label>
                                                <input type="text" class="form-control" name="qc_cutting" id="qc_cutting" readonly value="<?php echo $qc_cutting ?>">
                                            </div>
                                            <!-- /.form-group -->
                                            <div class="form-group">
                                                <label>Press</label>
                                                <input type="text" class="form-control" name="qc_press" id="qc_press" readonly value="<?php echo $qc_press ?>">
                                                <!-- /.form-group -->
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Jahit</label>
                                                <input type="text" class="form-control" name="qc_jahit" id="qc_jahit" readonly value="<?php echo $qc_jahit ?>">
                                            </div>
                                            <!-- /.form-group -->
                                            <div class="form-group">
                                                <label>Overdeck</label>
                                                <input type="text" class="form-control" name="qc_overdeck" id="qc_overdeck" readonly value="<?php echo $qc_overdeck ?>">
                                                <!-- /.form-group -->
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Obras</label>
                                                <input type="text" class="form-control" name="qc_obras" id="qc_obras" readonly value="<?php echo $qc_obras ?>">
                                            </div>
                                            <!-- /.form-group -->
                                            <div class="form-group">
                                                <label>Jumlah Diterima</label>
                                                <input type="text" class="form-control" placeholder="jumlah diterima" name="jumlah_diterima" id="jumlah_diterima" readonly value="<?php echo $jumlah_diterima ?>">
                                                <!-- /.form-group -->
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Jumlah Ditolak</label>
                                                <input type="text" class="form-control" placeholder="jumlah ditolak" name="jumlah_ditolak" id="jumlah_ditolak" readonly value="<?php echo $jumlah_ditolak ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Alasan</label>
                                                <input type="text" class="form-control" placeholder="Alasan" name="alasan_qc" id="alasan_qc" readonly value="<?php echo $alasan_qc ?>">
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <input type="text" class="form-control" placeholder="status" name="status_qc" id="status_qc" readonly value="<?php echo $status_qc ?>">
                                                <!-- /.form-group -->
                                            </div>
                                            <!-- /.col -->
                                        </div>

                                        <!-- /.col -->
                                        <!-- /.row -->
                                    </div>
                                    <div class="card-header">
                                        <h3 class="card-title">Progress bar</h3>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Desain (<?php echo $desain2 ?> % )</label>
                                            <div class="progress">
                                                <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $desain2 ?>%">
                                                    <span class="sr-only">40% Complete (success)</span>
                                                </div>
                                            </div>
                                            <label>Print (<?php echo $total_print ?> % )</label>
                                            <div class="progress">
                                                <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $total_print ?>%">
                                                    <span class="sr-only">40% Complete (success)</span>
                                                </div>
                                            </div>
                                            <label>Press (<?php echo $total_press ?> % )</label>
                                            <div class="progress">
                                                <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $total_press ?>%">
                                                    <span class="sr-only">40% Complete (success)</span>
                                                </div>
                                            </div>
                                            <label>QC (<?php echo $total_qc ?> % )</label>
                                            <div class="progress">
                                                <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $total_qc ?>%">
                                                    <span class="sr-only">40% Complete (success)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Cutting (<?php echo $total_cutting ?> % )</label>
                                            <div class="progress">
                                                <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $total_cutting ?>%">
                                                    <span class="sr-only">40% Complete (success)</span>
                                                </div>
                                            </div>
                                            <label>Jahit (<?php echo $total_jahit ?> % )</label>
                                            <div class="progress">
                                                <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $total_jahit ?>%">
                                                    <span class="sr-only">40% Complete (success)</span>
                                                </div>
                                            </div>
                                            <label>Overdeck (<?php echo $total_overdeck ?> % )</label>
                                            <div class="progress">
                                                <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $total_overdeck ?>%">
                                                    <span class="sr-only">40% Complete (success)</span>
                                                </div>
                                            </div>
                                            <label>Obras (<?php echo $total_obras ?> % )</label>
                                            <div class="progress">
                                                <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $total_obras ?>%">
                                                    <span class="sr-only">40% Complete (success)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->


                    <!-- /.container-fluid -->
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

    <script>
        var readUrl = '<?php echo site_url('LaporanProduksi_controller/read') ?>';
        var detailUrl = '<?php echo site_url('LaporanProduksi_controller/get_detail') ?>';
    </script>
    <script src="<?php echo base_url('assets/js/laporan_produksi.js') ?>"></script>

</body>

</html>