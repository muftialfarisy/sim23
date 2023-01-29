                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>


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
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#33FF55','#DAFF33', '#33FFEC','#229389','#226293','#C30BFF','#F50BFF','#FF0B6F','#FFAA0B','#A8FF0B','#0F2B66','#696E76'],
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