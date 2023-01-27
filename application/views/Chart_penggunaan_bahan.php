                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>

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
<script>
        //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
       <?php
            // if (count($pengunaan_bahan)>0) {
            //   foreach ($pengunaan_bahan as $data) {
            //     echo "'" .$data->nama_bahan ."',";
            //   }
            // }
                    $hasil = $this->db->select('penggunaan_bahan.id as idd,penggunaan_bahan.jenis_produk,penggunaan_bahan.nama_bahan,penggunaan_bahan.jumlah_pesanan,penggunaan_bahan.jumlah_bahan,penggunaan_bahan.total_bahan,penggunaan_bahan.status,bahan.id,bahan.nama_bahan as bahann,bahan.jumlah as jumlah,bahan.id as idd_bahan')
                                ->from('penggunaan_bahan')
                                ->join('bahan', 'penggunaan_bahan.id_bahan = bahan.id')
                                ->get()
                                ->result();
                            // $result = $this->db->get('penggunaan_bahan')->num_rows();
                            foreach ($hasil as $hasil_bahan) {
                                // $id = $hasil_bahan->id;
                                $bahan = $hasil_bahan->bahann;
                             echo "'" .$bahan."', ";
                            }
          ?>
      
      ],
      datasets: [
        {
          data: [    
                <?php
                            $total = $this->db->select('*')
                                ->from('penggunaan_bahan')
                                ->get()
                                ->result();
                            $result = $this->db->get('penggunaan_bahan')->num_rows();
                            foreach ($total as $total_bahan) {
                                // $id = $hasil_bahan->id;
                                $bahann = $total_bahan->total_bahan;
                            }
                            echo $bahann . ",";
                            ?>
              ],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })
</script>