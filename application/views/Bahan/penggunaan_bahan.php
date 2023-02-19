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
                                <li class="breadcrumb-item active">Permintaan Bahan</li>
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
                                    <h3 class="card-title">Data Permintaan Bahan</h3>
                                    <?php if ($jabatan == "kepala_produksi") { ?>
                                        <button class="btn btn-success" data-toggle="modal" data-target="#modal" onclick="add()" style="float:right;"><i class="fa-solid fa-plus"></i>Add Permintaan</button>
                                    <?php } ?>
                                    <!-- <button style="float:right;">Tambah Data User</button> -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="penggunaan_bahan" class="table table-bordered table-hover" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Produk</th>
                                                <th>Nama Bahan</th>
                                                <th>Jumlah Pesanan</th>
                                                <th>Jumlah Bahan</th>
                                                <th>Total Bahan</th>
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
                                <input type="hidden" name="id">

                                <div class="form-group">
                                    <label>Jenis Produk</label>
                                    <select class="form-control" id="jenis_produk" name="jenis_produk">
                                        <option value="jersey">Jersey</option>
                                        <option value="jacket">Jacket</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Bahan</label>
                                    <!-- <select class="form-control" id="nama_bahan" name="nama_bahan" onchange="get_bahan()"> -->
                                    <select class="form-control" id="nama_bahan" name="nama_bahan">
                                        <?php
                                        $hasil = $this->db->select('*')
                                            ->from('bahan')
                                            ->get()
                                            ->result();
                                        $result = $this->db->get('bahan')->num_rows();
                                        ?>
                                        <?php
                                        foreach ($hasil as $hasil_bahan) {
                                            $id = $hasil_bahan->id;
                                            $bahan = $hasil_bahan->nama_bahan;
                                            $jumlah = $hasil_bahan->jumlah;
                                            ?>
                                            <option value="<?php echo $id ?>"><?= $bahan ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <?php
                                $hasil = $this->db->select('*')
                                    ->from('bahan')
                                    ->get()
                                    ->result();
                                $result = $this->db->get('bahan')->num_rows();
                                ?>
                                <?php
                                foreach ($hasil as $hasil_bahann) {
                                    $id2 = $hasil_bahann->id;
                                    $jumlah2 = $hasil_bahann->jumlah;
                                    ?>
                                    <input type="text" name="id_bahan" id="id_bahan" value="<?= $id2 ?>">
                                    <!-- <input type="text" name="jumlah_bahan" id="jumlah_bahan" value="<?= $jumlah2 ?>"> -->
                                <?php } ?>
                                <input type="text" name="jumlahbahan" id="jumlahbahan" value="">

                                <div class=" form-group">
                                    <label>Jumlah Pesanan</label>
                                    <input type="number" class="form-control" placeholder="jumlah pesanan" name="jumlah_pesanan" id="jumlah_pesanan">
                                </div>
                                <div class="form-group">
                                    <label>jumlah Bahan</label>
                                    <input type="text" class="form-control" placeholder="Jumlah Bahan" name="jumlah_bahan" id="jumlah_bahan">
                                </div>
                                <div class="form-group">
                                    <label>Total Bahan</label>
                                    <input type="text" class="form-control" placeholder="Total Bahan" name="total_bahan" id="total_bahan">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="1">Pengajuan</option>
                                        <option value="2">Tidak Tersedia</option>
                                        <option value="3">Tersedia</option>
                                    </select>
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
        var readUrl = '<?php echo site_url('PenggunaanBahan_controller/read') ?>';
        var addUrl = '<?php echo site_url('PenggunaanBahan_controller/add') ?>';
        var deleteUrl = '<?php echo site_url('PenggunaanBahan_controller/delete') ?>';
        var editUrl = '<?php echo site_url('PenggunaanBahan_controller/edit') ?>';
        var getBahanUrl = '<?php echo site_url('PenggunaanBahan_controller/get_bahan') ?>';
        var getBahannUrl = '<?php echo site_url('PenggunaanBahan_controller/get_bahann') ?>';
    </script>
    <script src="<?php echo base_url('assets/js/penggunaan_bahan.js') ?>"></script>
    <!-- <script>
        $(document).ready(function() {
            $("#nama_bahan").click(function() {
                // var id = $("#bahan").val();
                var id = $(this).val();

                $.ajax({
                    url: '<?php echo site_url('PenggunaanBahan_controller/get_bahan') ?>';,
                    method: "POST",
                    type: "post",
                    data: {
                        id: id,
                    },
                    async: true,
                    dataType: "json",
                    success: (res) => {
                        $("#id_bahan").val(res.id);
                        $('#jumlah_bahan').val(res.jumlah_bahan);

                    },

                    error: (err) => {
                        console.log(err);
                    },
                });
                console.log(id);
                // return false;
                // console.log($("#bahan").val());
                // console.log($("#id_bahan").val());
            });
        });
    </script> -->
</body>

</html>