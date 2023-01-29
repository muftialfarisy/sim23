<?php $jabatan = $this->session->userdata('jabatan'); ?>
<?php
$hasil_produksi = $this->db->select('count(notifikasi) as jumlah_notifikasi')
    ->from('produksi')
    ->where('notifikasi', 1)
    ->get()
    ->result();
if ($jabatan == "kepala_produksi") {
    $hasil_permintaan = $this->db->select('count(notifikasi) as jumlah_notifikasi')
        ->from('penggunaan_bahan')
        ->where('notifikasi', 2)
        ->get()
        ->result();
} else {
    $hasil_permintaan = $this->db->select('count(notifikasi) as jumlah_notifikasi')
        ->from('penggunaan_bahan')
        ->where('notifikasi', 3)
        ->get()
        ->result();
}
$hasil_pesanan = $this->db->select('count(notifikasi) as jumlah_notifikasi')
    ->from('pesanan')
    ->where('notifikasi', 1)
    ->get()
    ->result();
foreach ($hasil_produksi as $jumlah) {
    $jumlah_produksi = $jumlah->jumlah_notifikasi;
}
foreach ($hasil_permintaan as $jumlah) {
    $jumlah_permintaan = $jumlah->jumlah_notifikasi;
}
foreach ($hasil_pesanan as $jumlah) {
    $jumlah_pesanan = $jumlah->jumlah_notifikasi;
}
if ($jabatan == "kepala_produksi") {
    $total_notifikasi = (int) $jumlah_produksi + (int) $jumlah_permintaan;
} else if ($jabatan == "gudang") {
    $total_notifikasi = (int) $jumlah_permintaan;
} else {
    $total_notifikasi = (int) $jumlah_produksi + (int) $jumlah_pesanan;
}
?>
<li class="nav-item dropdown list-notifikasi">
    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <span class="badge badge-warning navbar-badge"><?php echo $total_notifikasi ?></span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header"><?php echo $total_notifikasi ?> Notifications</span>
        <div class="dropdown-divider"></div>
        <?php if ($jabatan == "kepala_produksi" || $jabatan == "operasional_produksi") { ?>
            <a href="<?php echo site_url('produksi') ?>" class="dropdown-item" onclick='updateProduksi()'>
                <!-- <i class="fas fa-envelope mr-2"></i>  -->
                <ion-icon name="albums-sharp"></ion-icon>
                <?php
                    $hasil = $this->db->select('count(notifikasi) as jumlah_notifikasi')
                        ->from('produksi')
                        ->where('notifikasi', 1)
                        ->get()
                        ->result();
                    foreach ($hasil as $jumlah) {
                        $jumlah_notifikasi = $jumlah->jumlah_notifikasi;
                        // $total_notifikasi = $jumlah_notifikasi;
                        echo $jumlah_notifikasi . " " . "produksi baru";
                        ?>
                <?php } ?>

                <!-- <span class="float-right text-muted text-sm">3 mins</span> -->
            </a>
        <?php } ?>
        <div class="dropdown-divider"></div>
        <?php if ($jabatan == "kepala_produksi") { ?>
            <a href="<?php echo site_url('penggunaan_bahan') ?>" class="dropdown-item" onclick='updatePenggunaanBahan()'>
                <ion-icon name="albums-sharp"></ion-icon>
                <?php
                    $hasil = $this->db->select('count(notifikasi) as jumlah_notifikasi')
                        ->from('penggunaan_bahan')
                        ->where('notifikasi', 2)
                        ->get()
                        ->result();
                    foreach ($hasil as $jumlah) {
                        $jumlah_notifikasi = $jumlah->jumlah_notifikasi;
                        echo $jumlah_notifikasi . " " . "Permintaan Bahan Baru";
                        ?>
            </a>
        <?php } ?>
    <?php } else if ($jabatan == "gudang") { ?>
        <a href="<?php echo site_url('penggunaan_bahan') ?>" class="dropdown-item" onclick='updatePenggunaanBahan()'>
            <ion-icon name="albums-sharp"></ion-icon>
            <?php
                $hasil = $this->db->select('count(notifikasi) as jumlah_notifikasi')
                    ->from('penggunaan_bahan')
                    ->where('notifikasi', 3)
                    ->get()
                    ->result();
                foreach ($hasil as $jumlah) {
                    $jumlah_notifikasi = $jumlah->jumlah_notifikasi;
                    echo $jumlah_notifikasi . " " . "Permintaan Bahan Baru";
                }
                ?>
        </a>
    <?php } ?>
    <div class="dropdown-divider"></div>
    <?php if ($jabatan == "admin" || $jabatan == "operasional_produksi") { ?>
        <a href="<?php echo site_url('pesanan') ?>" class="dropdown-item">
            <ion-icon name="basket-sharp"></ion-icon>
            <?php
                $hasil = $this->db->select('count(notifikasi) as jumlah_notifikasi')
                    ->from('pesanan')
                    ->where('notifikasi', 1)
                    ->get()
                    ->result();
                foreach ($hasil as $jumlah) {
                    $jumlah_notifikasi = $jumlah->jumlah_notifikasi;
                    echo $jumlah_notifikasi . " " . "Pesanan Baru";
                }
                ?>
            <!-- <span class="float-right text-muted text-sm">2 days</span> -->
        </a>
    <?php } ?>
    <div class="dropdown-divider"></div>
    <!-- <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a> -->
    </div>
</li>

<!-- end -->