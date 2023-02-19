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
                            <h1>QC</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">QC</li>
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
                                    <h3 class="card-title">Data QC</h3>
                                    <button class="btn btn-success" data-toggle="modal" data-target="#modal" onclick="add()" style="float:right;"><i class="fa-solid fa-plus"></i>Add QC</button>
                                    <!-- <button style="float:right;">Tambah Data User</button> -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="qc" class="table table-bordered table-hover" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>No.PO</th>
                                                <th>Customer</th>
                                                <th>Tema Design</th>
                                                <th>Desain</th>
                                                <th>Print</th>
                                                <th>Cutting</th>
                                                <th>Press</th>
                                                <th>Jahit</th>
                                                <th>Overdeck</th>
                                                <th>Obras</th>
                                                <th>Jumlah Diterima</th>
                                                <th>Jumlah Ditolak</th>
                                                <th>Alasan</th>
                                                <th>Status</th>
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
                                <!-- <input type="text" name="id"> -->
                                <input type="text" class="form-control" placeholder="ID" name="id" id="id">
                                <div class="form-group">
                                    <label>No.PO</label>
                                    <select class="form-control" id="produksi_id" name="produksi_id">
                                        <option>pilih</option>
                                        <?php
                                        $hasil = $this->db->select('*')
                                            ->from('produksi')
                                            ->get()
                                            ->result();
                                        foreach ($hasil as $hasil_bahan) {
                                            $id = $hasil_bahan->id;
                                            $no_po = $hasil_bahan->no_po;
                                            ?>
                                            <option value="<?php echo $id ?>"><?= $no_po ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Desain</label>
                                    <select class="form-control" id="desain" name="desain">
                                        <option>Pilih</option>
                                        <option value="diterima">Diterima</option>
                                        <option value="ditolak">ditolak</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Print</label>
                                    <select class="form-control" id="print" name="print">
                                        <option>Pilih</option>
                                        <option value="diterima">Diterima</option>
                                        <option value="ditolak">ditolak</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Cutting</label>
                                    <select class="form-control" id="cutting" name="cutting">
                                        <option>Pilih</option>
                                        <option value="diterima">Diterima</option>
                                        <option value="ditolak">ditolak</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Press</label>
                                    <select class="form-control" id="press" name="press">
                                        <option>Pilih</option>
                                        <option value="diterima">Diterima</option>
                                        <option value="ditolak">ditolak</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jahit</label>
                                    <select class="form-control" id="jahit" name="jahit">
                                        <option>Pilih</option>
                                        <option value="diterima">Diterima</option>
                                        <option value="ditolak">ditolak</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Overdeck</label>
                                    <select class="form-control" id="overdeck" name="overdeck">
                                        <option>Pilih</option>
                                        <option value="diterima">Diterima</option>
                                        <option value="ditolak">ditolak</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Obras</label>
                                    <select class="form-control" id="obras" name="obras">
                                        <option>Pilih</option>
                                        <option value="diterima">Diterima</option>
                                        <option value="ditolak">ditolak</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Status Keseluruhan</label>
                                    <select class="form-control" id="status" name="status">
                                        <option>Pilih</option>
                                        <option value="diterima">Diterima</option>
                                        <option value="ditolak">ditolak</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Diterima</label>
                                    <input type="number" class="form-control" placeholder="Jumlah Diterima" name="jumlah_diterima" id="jumlah_deterima">
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Ditolak</label>
                                    <input type="number" class="form-control" placeholder="Jumlah Ditolak" name="jumlah_ditolak" id="jumlah_ditolak">
                                </div>
                                <div class="form-group">
                                    <label>Alasan Ditolak</label>
                                    <input type="text" class="form-control" placeholder="Alasan Ditolak" name="alasan" id="alasan">
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
    <script>
        var readUrl = '<?php echo site_url('QC_controller/read') ?>';
        var addUrl = '<?php echo site_url('QC_controller/add') ?>';
        var deleteUrl = '<?php echo site_url('QC_controller/delete') ?>';
        var editUrl = '<?php echo site_url('QC_controller/edit') ?>';
        var getUserUrl = '<?php echo site_url('QC_controller/get_user') ?>';
    </script>
    <script src="<?php echo base_url('assets/js/qc.js') ?>"></script>
</body>

</html>