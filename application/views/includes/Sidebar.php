        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #774c35">
            <?php $uri = $this->uri->segment(1) ?>
            <?php $jabatan = $this->session->userdata('jabatan'); ?>
            <?php $divisi = $this->session->userdata('divisi'); ?>
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="<?php echo base_url('assets/') ?>dist/img/logo.png" alt="logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light"> sarang tomket 23</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?php echo base_url('assets/') ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php echo $this->session->userdata('nama'); ?></a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <!-- <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div> -->

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <!-- <a href="dashboard" class="nav-link"> -->
                            <a href="<?php echo site_url('dashboard') ?>" class="nav-link <?php echo $uri == 'dashboard' || $uri == '' ? 'active' : 'no' ?>">
                                <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
                                <p>
                                    Home
                                </p>
                            </a>
                        </li>
                        <?php if ($divisi == "admin") { ?>
                            <li class="nav-item">
                                <!-- <a href="user" class="nav-link"> -->
                                <a href="<?php echo site_url('user') ?>" class=" nav-link <?php echo $uri == 'user' || $uri == '' ? 'active' : 'no' ?>">
                                    <!-- <a href="User_controller" class="nav-link <?php echo $uri == 'User' || $uri == '' ? 'active' : 'no' ?>"> -->
                                    <!-- <i class="nav-icon fas fa-user"></i> -->
                                    <p>
                                        User
                                    </p>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if ($divisi == "admin_cs" || $jabatan == "operasional_produksi") { ?>
                            <li class="nav-item">
                                <!-- <a href="user" class="nav-link"> -->
                                <a href="<?php echo site_url('pesanan') ?>" class=" nav-link <?php echo $uri == 'pesanan' || $uri == '' ? 'active' : 'no' ?>">
                                    <!-- <i class="nav-icon fas fa-solid fa-circle"></i> -->
                                    <p>
                                        Data Pesanan
                                    </p>
                                </a>
                            </li>

                        <?php } ?>
                        <?php if ($jabatan == "operasional_produksi") { ?>
                            <li class="nav-item">
                                <!-- <a href="user" class="nav-link"> -->
                                <a href="<?php echo site_url('produksi') ?>" class=" nav-link <?php echo $uri == 'produksi' || $uri == '' ? 'active' : 'no' ?>">
                                    <!-- <i class="nav-icon fas fa-solid fa-circle"></i> -->
                                    <p>
                                        Data Produksi
                                    </p>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if ($jabatan == "kepala_produksi" || $jabatan == "operasional_produksi") { ?>
                            <li class="nav-item">
                                <!-- <a href="user" class="nav-link"> -->
                                <a href="<?php echo site_url('laporan_produksi') ?>" class=" nav-link <?php echo $uri == 'laporan_produksi' || $uri == '' ? 'active' : 'no' ?>">
                                    <!-- <i class="nav-icon fas fa-solid fa-circle"></i> -->
                                    <p>
                                        Data Laporan Produksi
                                    </p>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if ($jabatan == "gudang" || $jabatan == "kepala_produksi") { ?>
                            <li class="nav-item">
                                <!-- <a href="user" class="nav-link"> -->
                                <a href="<?php echo site_url('penggunaan_bahan') ?>" class=" nav-link <?php echo $uri == 'penggunaan_bahan' || $uri == '' ? 'active' : 'no' ?>">
                                    <!-- <i class="nav-icon fas fa-solid fa-circle"></i> -->
                                    <p>
                                        Data Penggunaan Bahan
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <!-- <a href="user" class="nav-link"> -->
                                <a href="<?php echo site_url('retur_bahan') ?>" class=" nav-link <?php echo $uri == 'retur_bahan' || $uri == '' ? 'active' : 'no' ?>">
                                    <!-- <i class="nav-icon fas fa-solid fa-circle"></i> -->
                                    <p>
                                        Data Retur Bahan
                                    </p>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if ($jabatan == "gudang") { ?>
                            <li class="nav-item">
                                <!-- <a href="user" class="nav-link"> -->
                                <a href="<?php echo site_url('bahan') ?>" class=" nav-link <?php echo $uri == 'bahan' || $uri == '' ? 'active' : 'no' ?>">
                                    <!-- <i class="nav-icon fas fa-solid fa-circle"></i> -->
                                    <p>
                                        Data Bahan
                                    </p>
                                </a>
                            </li>
                        <?php } ?>
                        <!-- <?php if ($jabatan == "operasional_produksi" || $jabatan == "kepala_produksi") { ?>
                            <li class="nav-item">
                                <a href="<?php echo site_url('bahan') ?>" class=" nav-link <?php echo $uri == 'bahan' || $uri == '' ? 'active' : 'no' ?>">
                                    <i class="nav-icon fas fa-solid fa-circle"></i>
                                    <p>
                                        Penjadwalan
                                    </p>
                                </a>
                            </li>
                        <?php } ?> -->
                        <li class="nav-item">
                            <!-- <a href="user" class="nav-link"> -->
                            <a href="<?php echo site_url('mesin') ?>" class=" nav-link <?php echo $uri == 'mesin' || $uri == '' ? 'active' : 'no' ?>" hidden>
                                <!-- <i class="nav-icon fas fa-solid fa-circle"></i> -->
                                <p>
                                    Mesin Jersey
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <!-- <a href="user" class="nav-link"> -->
                            <a href="<?php echo site_url('mesin_jaket') ?>" class=" nav-link <?php echo $uri == 'mesin_jaket' || $uri == '' ? 'active' : 'no' ?>" hidden>
                                <!-- <i class="nav-icon fas fa-solid fa-circle"></i> -->
                                <p>
                                    Mesin Jaket
                                </p>
                            </a>
                        </li>
                        <?php if ($jabatan == "operasional_produksi" || $jabatan == "kepala_produksi") { ?>
                            <li class="nav-item">
                                <!-- <a href="user" class="nav-link"> -->
                                <a href="<?php echo site_url('estimasi') ?>" class=" nav-link <?php echo $uri == 'estimasi' || $uri == '' ? 'active' : 'no' ?>">
                                    <!-- <i class="nav-icon fas fa-solid fa-circle"></i> -->
                                    <p>
                                        Estimasi
                                    </p>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if ($jabatan == "kepala_produksi") { ?>
                            <li class="nav-item">
                                <!-- <a href="user" class="nav-link"> -->
                                <a href="<?php echo site_url('penjadwalan') ?>" class=" nav-link <?php echo $uri == 'penjadwalan' || $uri == '' ? 'active' : 'no' ?>">
                                    <!-- <i class="nav-icon fas fa-solid fa-circle"></i> -->
                                    <p>
                                        Penjadwalan
                                    </p>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if ($divisi == "desain") { ?>
                            <li class="nav-item">
                                <!-- <a href="user" class="nav-link"> -->
                                <a href="<?php echo site_url('desain') ?>" class=" nav-link <?php echo $uri == 'desain' || $uri == '' ? 'active' : 'no' ?>">
                                    <!-- <i class="nav-icon fas fa-solid fa-circle"></i> -->
                                    <p>
                                        Desain
                                    </p>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if ($divisi == "qc") { ?>
                            <li class="nav-item">
                                <!-- <a href="user" class="nav-link"> -->
                                <a href="<?php echo site_url('qc') ?>" class=" nav-link <?php echo $uri == 'qc' || $uri == '' ? 'active' : 'no' ?>">
                                    <!-- <i class="nav-icon fas fa-solid fa-circle"></i> -->
                                    <p>
                                        QC
                                    </p>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if ($divisi == "print") { ?>
                            <li class="nav-item">
                                <!-- <a href="user" class="nav-link"> -->
                                <a href="<?php echo site_url('print') ?>" class=" nav-link <?php echo $uri == 'print' || $uri == '' ? 'active' : 'no' ?>">
                                    <!-- <i class="nav-icon fas fa-solid fa-circle"></i> -->
                                    <p>
                                        Print
                                    </p>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if ($divisi == "press") { ?>
                            <li class="nav-item">
                                <!-- <a href="user" class="nav-link"> -->
                                <a href="<?php echo site_url('press') ?>" class=" nav-link <?php echo $uri == 'press' || $uri == '' ? 'active' : 'no' ?>">
                                    <!-- <i class="nav-icon fas fa-solid fa-circle"></i> -->
                                    <p>
                                        Press
                                    </p>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if ($divisi == "cutting") { ?>
                            <li class="nav-item">
                                <!-- <a href="user" class="nav-link"> -->
                                <a href="<?php echo site_url('cutting') ?>" class=" nav-link <?php echo $uri == 'cutting' || $uri == '' ? 'active' : 'no' ?>">
                                    <!-- <i class="nav-icon fas fa-solid fa-circle"></i> -->
                                    <p>
                                        Cutting
                                    </p>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if ($divisi == "jahit") { ?>
                            <li class="nav-item">
                                <!-- <a href="user" class="nav-link"> -->
                                <a href="<?php echo site_url('jahit') ?>" class=" nav-link <?php echo $uri == 'jahit' || $uri == '' ? 'active' : 'no' ?>">
                                    <!-- <i class="nav-icon fas fa-solid fa-circle"></i> -->
                                    <p>
                                        Jahit
                                    </p>
                                </a>
                            </li>
                        <?php } ?>

                    </ul>
                    </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>