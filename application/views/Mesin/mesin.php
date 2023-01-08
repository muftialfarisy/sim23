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
                            <h1>Mesin Jersey</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Mesin Jersey</li>
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
                                    <h3 class="card-title">Tabel Mesin Jersey</h3>
                                    <?php if ($jabatan == "admin") { ?>
                                        <button class="btn btn-success" data-toggle="modal" data-target="#modal" onclick="add()" style="float:right;">Add</button>
                                    <?php } ?>
                                    <!-- <button style="float:right;">Tambah Data User</button> -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="mesin" class="table table-bordered table-hover" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Desain</th>
                                                <th>Print</th>
                                                <th>Cutting</th>
                                                <th>Press</th>
                                                <th>Jahit</th>
                                                <th>Overdeck</th>
                                                <th>Obras</th>
                                                <th>QC</th>
                                                <th>Waktu Total Cutting</th>
                                                <th>Waktu Total QC</th>
                                                <th>Waktu Total</th>
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
                                <input type="text" name="id">
                                <input type="text" name="no" id="no">
                                <div class="form-group">
                                    <label>desain</label>
                                    <input type="text" class="form-control" placeholder="Desain" name="desain" id="desain">
                                </div>
                                <div class="form-group">
                                    <label>Print</label>
                                    <input type="text" class="form-control" placeholder="Print" name="print" id="print">
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Cutting</label>
                                        <input type="text" class="form-control" placeholder="Cutting" name="cutting" id="cutting">
                                    </div>
                                    <div class="form-group">
                                        <label>Press</label>
                                        <input type="text" class="form-control" name="press" id="press">
                                    </div>
                                    <div class="form-group">
                                        <label>Jahit</label>
                                        <input type="text" class="form-control" name="jahit" id="jahit">

                                    </div>
                                    <div class="form-group">
                                        <label>Overdeck</label>
                                        <input type="text" class="form-control" name="overdeck" id="overdeck">

                                    </div>
                                    <div class="form-group">
                                        <label>Obras</label>
                                        <input type="text" class="form-control" placeholder="Obras" name="obras" id="obras">

                                    </div>
                                    <div class="form-group">
                                        <label>QC</label>
                                        <input type="text" class="form-control" name="qc" id="qc">
                                    </div>
                                    <div class="form-group">
                                        <label>rata2</label>
                                        <?php
                                        $hasil = $this->db->select('id,NO,sum(desain) as desain, sum(print) as print, sum(cutting) as cutting, sum(press) as press, sum(jahit) as jahit, sum(overdeck) as overdeck, sum(obras) as obras, sum(qc) as qc')
                                            ->from('mesin_jersey')
                                            ->get()
                                            ->result();
                                        $result = $this->db->get('mesin_jersey')->num_rows();
                                        foreach ($hasil as $mesin_jersey) {
                                            $rata_desasin = $mesin_jersey->desain;
                                            $rata_print = $mesin_jersey->print;
                                            $rata_cutting = $mesin_jersey->cutting;
                                            $rata_press = $mesin_jersey->press;
                                            $rata_jahit = $mesin_jersey->jahit;
                                            $rata_overdeck = $mesin_jersey->overdeck;
                                            $rata_obras = $mesin_jersey->obras;
                                            $rata_qc = $mesin_jersey->qc;
                                        ?>
                                            <!-- <input type="text" class="form-control" placeholder="Desain" name="rata_desain" id="rata_desain"> -->
                                            <input type="text" class="form-control" placeholder="Desain" name="rata_desain" id="rata_desain" value=<?= $rata_desasin ?>>
                                            <!-- <input type="text" class="form-control" name="rata_print" id="rata_print"> -->
                                            <input type="text" class="form-control" name="rata_print" id="rata_print" value=<?= $rata_print ?>>
                                            <!-- <input type="text" class="form-control" name="rata_cutting" id="rata_cutting"> -->
                                            <input type="text" class="form-control" name="rata_cutting" id="rata_cutting" value=<?= $rata_cutting ?>>
                                            <!-- <input type="text" class="form-control" name="rata_press" id="rata_press"> -->
                                            <input type="text" class="form-control" name="rata_press" id="rata_press" value=<?= $rata_press ?>>
                                            <!-- <input type="text" class="form-control" name="rata_jahit" id="rata_jahit"> -->
                                            <input type="text" class="form-control" name="rata_jahit" id="rata_jahit" value=<?= $rata_jahit ?>>
                                            <!-- <input type="text" class="form-control" name="rata_overdeck" id="rata_overdeck"> -->
                                            <input type="text" class="form-control" name="rata_overdeck" id="rata_overdeck" value=<?= $rata_overdeck ?>>
                                            <!-- <input type="text" class="form-control" name="rata_obras" id="rata_obras"> -->
                                            <input type="text" class="form-control" name="rata_obras" id="rata_obras" value=<?= $rata_obras ?>>
                                            <!-- <input type="text" class="form-control" name="rata_qc" id="rata_qc"> -->
                                            <input type="text" class="form-control" name="rata_qc" id="rata_qc" value=<?= $rata_qc ?>>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Total Cutting</label>
                                        <input type="text" class="form-control" placeholder="total cutting" name="total_cutting" id="total_cutting">
                                    </div>
                                    <div class="form-group">
                                        <label>Total QC</label>
                                        <input type="text" class="form-control" placeholder="Total QC" name="total_qc" id="total_qc">
                                    </div>
                                    <div class="form-group">
                                        <label>Waktu Total</label>
                                        <input type="text" class="form-control" placeholder="Waktu Total" name="waktu_total" id="waktu_total">
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
        var readUrl = '<?php echo site_url('Mesin_controller/read') ?>';
        var addUrl = '<?php echo site_url('Mesin_controller/add') ?>';
        var deleteUrl = '<?php echo site_url('Mesin_controller/delete') ?>';
        var editUrl = '<?php echo site_url('Mesin_controller/edit') ?>';
        var getMesinUrl = '<?php echo site_url('Mesin_controller/get_mesin') ?>';
        var getRataUrl = '<?php echo site_url('Mesin_controller/get_rata') ?>';
    </script>
    <script src="<?php echo base_url('assets/js/mesin.js') ?>"></script>
</body>

</html>