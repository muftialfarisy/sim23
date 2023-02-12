       <section class="col connectedSortable">
           <?php if ($jabatan == "kepala_produksi") { ?>
               <div class="card card-danger">
                   <div class="card-header">
                       <h3 class="card-title">Chart Progress Produksi</h3>

                       <div class="card-tools">
                           <button type="button" class="btn btn-tool" data-card-widget="collapse">
                               <i class="fas fa-minus"></i>
                           </button>
                           <button type="button" class="btn btn-tool" data-card-widget="remove">
                               <i class="fas fa-times"></i>
                           </button>
                       </div>
                   </div>
                   <div class="card-body">

                       <?php $this->load->view('Chart_progress_produksi'); ?>
                       <div>
                           <select class="form-control" name="nama_customer" id="nama_customer">
                               <option>pilih</option>
                               <?php

                                    $hasil = $this->db->select('*')
                                        ->from('produksi')
                                        ->get()
                                        ->result();
                                    foreach ($hasil as $hasil_produksi) {
                                        $id = $hasil_produksi->id;
                                        $customer = $hasil_produksi->customer;
                                        ?>
                                   <option value="<?php echo $customer ?>"><?php echo $customer ?></option>
                               <?php } ?>
                           </select>
                       </div>
                       <canvas id="donutChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>

                   </div>
                   <!-- /.card-body -->
               </div>
           <?php } ?>
           <!-- /.card-body -->
       </section>