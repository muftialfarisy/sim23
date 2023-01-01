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
                            <h1>Produksigit</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Produksi</li>
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
                                    <h3 class="card-title">Tabel Produksi</h3>
                                    <button class="btn btn-success" data-toggle="modal" data-target="#modal" onclick="add()" style="float:right;">Add</button>
                                    <!-- <button style="float:right;">Tambah Data User</button> -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="produksi" class="table table-bordered table-hover" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Tanggal Order</th>
                                                <th>No.PO</th>
                                                <th>Invoice PO</th>
                                                <th>Customer</th>
                                                <th>Tema Design</th>
                                                <th>Jumlah Pesanan</th>
                                                <th>Produk</th>
                                                <th>Bahan</th>
                                                <th>Jumlah Produk</th>
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
                                    <label>tanggal Order</label>
                                    <input type="date" class="form-control" name="tanggal_order" id="tanggal_order">
                                </div>
                                <div class="form-group">
                                    <label>No.PO</label>
                                    <input type="number" class="form-control" placeholder="No.PO" name="no_po" id="no_po">
                                </div>
                                <div class=" form-group">
                                    <label>Invoice PO</label>
                                    <input type="text" class="form-control" placeholder="Invoice PO" name="invoice_po" id="invoice_po">
                                </div>
                                <div class="form-group">
                                    <label>Customer</label>
                                    <input type="text" class="form-control" placeholder="Customer" name="customer" id="customer">
                                </div>
                                <div class="form-group">
                                    <label>Tema Design</label>
                                    <input type="text" class="form-control" placeholder="Tema Design" name="tema_design" id="tema_design">
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Pesanan</label>
                                    <input type="text" class="form-control" placeholder="Jumlah Pesanan" name="jumlah_pesanan" id="jumlah_pesanan">
                                </div>
                                <div class="form-group">
                                    <label>Produk</label>
                                    <input type="text" class="form-control" placeholder="Produk" name="produk" id="produk">
                                </div>
                                <div class="form-group">
                                    <label>Bahan</label>
                                    <select class="form-control" id="bahan" name="bahan">
                                        <?php
                                        $hasil = $this->db->select('*')
                                            ->from('bahan')
                                            ->get()
                                            ->result();
                                        $result = $this->db->get('bahan')->num_rows();
                                        foreach ($hasil as $hasil_bahan) {
                                            $id = $hasil_bahan->id;
                                            $bahan = $hasil_bahan->nama_bahan;
                                        ?>
                                            <option value="<?php echo $id ?>"><?= $bahan ?></option>
                                </div>
                            <?php } ?>
                            </select>
                            <?php
                            $hasil = $this->db->select('*')
                                ->from('bahan')
                                ->get()
                                ->result();
                            $result = $this->db->get('bahan')->num_rows();
                            foreach ($hasil as $hasil_bahan) {
                                $id = $hasil_bahan->id;
                                $bahan = $hasil_bahan->nama_bahan;
                            ?>
                                <!-- <input type="text" name="id_bahan" id="id_bahan" value=" <?= $id ?>"> -->
                            <?php } ?>
                            <input type="text" name="id_bahan" id="id_bahan" value="">

                            <div class="form-group">
                                <label>Jumlah Produk</label>
                                <input type="number" class="form-control" placeholder="Jumlah Produk" name="jumlah_produk" id="jumlah_produk">
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
        var readUrl = '<?php echo site_url('Produksi_controller/read') ?>';
        var addUrl = '<?php echo site_url('Produksi_controller/add') ?>';
        var deleteUrl = '<?php echo site_url('Produksi_controller/delete') ?>';
        var editUrl = '<?php echo site_url('Produksi_controller/edit') ?>';
        var getProduksiUrl = '<?php echo site_url('Produksi_controller/get_produksi') ?>';
        var getBahanUrl = '<?php echo site_url('Produksi_controller/get_bahan') ?>';
        var getBahannUrl = '<?php echo site_url('Produksi_controller/get_bahann') ?>';
    </script>
    <script src="<?php echo base_url('assets/js/produksi.js') ?>"></script>
    <script>
        $(document).ready(function() {
            $("#bahan").change(function() {
                // var id = $("#bahan").val();
                var id = $(this).val();

                // $.ajax({
                //     url: '<?php echo site_url('Produksi_controller/get_bahann') ?>';,
                //     method: "POST",
                //     type: "post",
                //     data: {
                //         id: id,
                //     },
                //     async: true,
                //     dataType: "json",
                //     success: (data) => {
                //         $('#id_bahan').val(data.id);

                //     },
                // });
                // $("#id_bahan").val(id);
                console.log(id);
                // return false;
                // console.log($("#bahan").val());
                // console.log($("#id_bahan").val());
            });
        });
    </script>
</body>

</html>