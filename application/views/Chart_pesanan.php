                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>

                  <script>
                      var areaChartData = {
                          labels: [
                              <?php
                                $tanggal = $this->db->select('*')
                                    ->from('pesanan')
                                    ->get()
                                    ->result();
                                foreach ($tanggal as $tanggal_pesanan) {
                                    // $id = $hasil_bahan->id;
                                    $tgl_pesanan = $tanggal_pesanan->tanggal_pesanan;
                                }
                                $month = date("M", strtotime($tgl_pesanan));
                                echo "'" . $month . "', ";
                                ?>
                          ],
                          datasets: [
                              <?php
                                $total_pesanan = $this->db->select('count(*) as total')
                                    ->from('pesanan')
                                    ->get()
                                    ->result();
                                foreach ($total_pesanan as $tl_pesanan) {
                                    // $id = $hasil_bahan->id;
                                    $jumlah_pesanan = $tl_pesanan->total;
                                }
                                ?> {
                                  label: 'Digital Goods',
                                  backgroundColor: 'rgba(60,141,188,0.9)',
                                  borderColor: 'rgba(60,141,188,0.8)',
                                  pointRadius: false,
                                  pointColor: '#3b8bba',
                                  pointStrokeColor: 'rgba(60,141,188,1)',
                                  pointHighlightFill: '#fff',
                                  pointHighlightStroke: 'rgba(60,141,188,1)',
                                  data: [<?php echo $jumlah_pesanan ?>]
                              },
                              {
                                  label: 'Electronics',
                                  backgroundColor: 'rgba(210, 214, 222, 1)',
                                  borderColor: 'rgba(210, 214, 222, 1)',
                                  pointRadius: false,
                                  pointColor: 'rgba(210, 214, 222, 1)',
                                  pointStrokeColor: '#c1c7d1',
                                  pointHighlightFill: '#fff',
                                  pointHighlightStroke: 'rgba(220,220,220,1)',
                                  data: [65, 59, 80, 81, 56, 55, 40]
                              },
                          ]
                      }
                      //-------------
                      //- BAR CHART -
                      //-------------
                      var barChartCanvas = $('#barChart').get(0).getContext('2d')
                      var barChartData = $.extend(true, {}, areaChartData)
                      var temp0 = areaChartData.datasets[0]
                      var temp1 = areaChartData.datasets[1]
                      barChartData.datasets[0] = temp1
                      barChartData.datasets[1] = temp0

                      var barChartOptions = {
                          responsive: true,
                          maintainAspectRatio: false,
                          datasetFill: false
                      }

                      new Chart(barChartCanvas, {
                          type: 'bar',
                          data: barChartData,
                          options: barChartOptions
                      })
                  </script>