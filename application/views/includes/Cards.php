<?php $jabatan = $this->session->userdata('jabatan'); ?>
<?php $divisi = $this->session->userdata('divisi'); ?>

<!-- Small boxes (Stat box) -->
<div class="row">
    <!-- <div class="col-lg-3 col-6">
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
                        </div> -->
    <!-- ./col -->
    <?php if ($jabatan == "gudang") { ?>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light">
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
                <a href="<?php echo site_url('bahan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    <?php } ?>
    <?php if ($jabatan == "operasional_produksi") { ?>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light">
                <div class="inner">
                    <?php
                        $hasil = $this->db->select('count(*) as jumlah')
                            ->from('produksi')
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

                    <p>Produksi</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="<?php echo site_url('produksi') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    <?php } ?>
    <!-- ./col -->
    <?php if ($jabatan == "admin") { ?>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light">
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
                <a href="<?php echo site_url('user') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    <?php } ?>
    <?php if ($jabatan == "kepala_produksi") { ?>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light">
                <div class="inner">
                    <?php
                        $hasil = $this->db->select('count(*) as jumlah')
                            ->from('produksi')
                            ->where('status', "Belum Dikerjakan")
                            ->get()
                            ->result();
                        $result = $this->db->get('produksi')->num_rows();
                        ?>
                    <?php
                        foreach ($hasil as $jumlah) {
                            $jumlah_bahan = $jumlah->jumlah;
                            ?>
                        <h3><?php echo $jumlah_bahan ?></h3>
                    <?php } ?>

                    <p>Jumlah Produksi yang Belum Dikerjakan</p>
                </div>
                <div class="icon">
                    <i class="fa-sharp fa-solid fa-xmark"></i>
                    <!-- <i class="ion ion-stats-bars"></i> -->
                </div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light">
                <div class="inner">
                    <?php
                        $hasil = $this->db->select('count(*) as jumlah')
                            ->from('produksi')
                            ->where('status', "Dikerjakan")
                            ->get()
                            ->result();
                        $result = $this->db->get('produksi')->num_rows();
                        ?>
                    <?php
                        foreach ($hasil as $jumlah) {
                            $jumlah_bahan = $jumlah->jumlah;
                            ?>
                        <h3><?php echo $jumlah_bahan ?></h3>
                    <?php } ?>

                    <p>Jumlah Produksi yang Sedang Dikerjakan</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-spinner"></i>
                </div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light">
                <div class="inner">
                    <?php
                        $hasil = $this->db->select('count(*) as jumlah')
                            ->from('produksi')
                            ->where('status', "Tepat Waktu")
                            ->get()
                            ->result();
                        $result = $this->db->get('produksi')->num_rows();
                        ?>
                    <?php
                        foreach ($hasil as $jumlah) {
                            $jumlah_bahan = $jumlah->jumlah;
                            ?>
                        <h3><?php echo $jumlah_bahan ?></h3>
                    <?php } ?>

                    <p>Jumlah Produksi yang Tepat Waktu</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-circle-check"></i>
                </div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light">
                <div class="inner">
                    <?php
                        $hasil = $this->db->select('count(*) as jumlah')
                            ->from('produksi')
                            ->where('status', "Terlambat")
                            ->get()
                            ->result();
                        $result = $this->db->get('produksi')->num_rows();
                        ?>
                    <?php
                        foreach ($hasil as $jumlah) {
                            $jumlah_bahan = $jumlah->jumlah;
                            ?>
                        <h3><?php echo $jumlah_bahan ?></h3>
                    <?php } ?>

                    <p>Jumlah Produksi yang Terlambat</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-exclamation"></i>
                </div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
    <?php } ?>
    <!-- ./col -->
    <?php if ($jabatan == "operasional_produksi" || $divisi == "admin") { ?>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light">
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
                <a href="<?php echo site_url('pesanan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    <?php } ?>
    <!-- ./col -->
</div>
<!-- /.row -->