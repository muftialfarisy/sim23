                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>150</h3>

                                    <p>New Orders</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <?php
                                    $hasil = $this->db->select('count(*) as jumlah')
                                        ->from('bahan')
                                        ->get()
                                        ->result();
                                    $result = $this->db->get('bahan')->num_rows();
                                    ?>
                                    <?php
                                    foreach ($hasil as $jumlah) {
                                        $jumlah_bahan = $jumlah->jumlah;
                                    ?>
                                        <h3><?php echo $jumlah_bahan ?></h3>
                                    <?php } ?>

                                    <p>Bahan</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <?php
                                    $hasil = $this->db->select('count(*) as jumlah')
                                        ->from('user')
                                        ->get()
                                        ->result();
                                    $result = $this->db->get('user')->num_rows();
                                    ?>
                                    <?php
                                    foreach ($hasil as $jumlah) {
                                        $jumlah_user = $jumlah->jumlah;
                                    ?>
                                        <h3><?php echo $jumlah_user ?></h3>
                                    <?php } ?>
                                    <p>Users</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <?php
                                    $hasil = $this->db->select('count(*) as jumlah')
                                        ->from('pesanan')
                                        ->get()
                                        ->result();
                                    $result = $this->db->get('pesanan')->num_rows();
                                    ?>
                                    <?php
                                    foreach ($hasil as $jumlah) {
                                        $jumlah_pesanan = $jumlah->jumlah;
                                    ?>
                                        <h3><?php echo $jumlah_pesanan ?></h3>
                                    <?php } ?>

                                    <p>Pesanan</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-solid fa-table"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                    <!-- Main row -->
                    <div class="row">

                    </div>
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->