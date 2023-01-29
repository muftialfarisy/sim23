        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?php echo base_url('assets/') ?>dist/img/logo.png" alt="AdminLTELogo" height="60" width="60">
        </div> -->
<?php $jabatan = $this->session->userdata('jabatan'); ?>
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #774c35">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">

                     <!-- Notifications Dropdown Menu -->
                     <?php if ($jabatan != "admin"){

                         $this->load->view('includes/Notification');
                     }
                     ?>
                <!-- end Notifications -->

                <li class="nav-item">
                    <a href="#" class="nav-link" data-toggle="dropdown">
                        <i class="far fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
                        <a href="<?php echo site_url('Login_controller/logout') ?>" class="dropdown-item">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->