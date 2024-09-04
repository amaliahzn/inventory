<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inventaris Tekno Birru Mulia | <?= $title; ?></title>
    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>src/backend/dist/img/faviconbirru.ico">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>src/backend/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url() ?>src/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>src/backend/dist/css/adminlte.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url() ?>src/backend/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Select2 -->
    <link href="<?= base_url() ?>src/backend/plugins/select2/css/select2.min.css" rel="stylesheet" />
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- jQuery -->
    <script src="<?= base_url() ?>src/backend/plugins/jquery/jquery.min.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <?php if ($this->session->userdata('role') == '1' || $this->session->userdata('role') == '2' || $this->session->userdata('role') == '3') { ?>

                    <?php
                    if ($this->session->userdata('role') == '1') :
                        $sql = "SELECT * FROM permintaan";
                    elseif ($this->session->userdata('role') == '2') :
                        $sql = "SELECT * FROM permintaan WHERE status_kabag='0'";
                    elseif ($this->session->userdata('role') == '3') :
                        $sql = "SELECT * FROM permintaan WHERE status_kasubag='0'";
                    endif;
                    $jml_permintaan = $this->db->query($sql)->num_rows();



                    ?>


                <?php } ?>
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">

                        <?php if ($this->session->userdata('foto') == NULL) : ?>
                            <img src="<?= base_url() ?>src/backend/dist/img/profile.png" class="user-image img-circle elevation-2">
                        <?php else : ?>
                            <img src="<?= base_url() ?>src/img/profile/<?= $this->session->userdata('foto') ?>" class="user-image img-circle elevation-2">
                        <?php endif ?>

                        <span class="d-none d-md-inline">Hi, <?php echo $this->session->userdata('nama_user'); ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header bg-info">

                            <?php if ($this->session->userdata('foto') == NULL) : ?>
                                <img src="<?= base_url() ?>src/backend/dist/img/profile.png" class="img-circle elevation-2">
                            <?php else : ?>
                                <img src="<?= base_url() ?>src/img/profile/<?= $this->session->userdata('foto') ?>" class="img-circle elevation-2">
                            <?php endif ?>

                            <p>
                                <?php echo $this->session->userdata('nama_user'); ?>
                                <small><?php echo $this->session->userdata('jabatan'); ?></small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <a href="<?= base_url('pengaturan') ?>" class="btn btn-info btn-flat">
                                <i class="nav-icon fa fa-users"></i> Edit Profil
                            </a>
                            <a href="<?= base_url('logout') ?>" class="btn btn-danger btn-flat float-right">
                                <i class="fas fa-sign-out-alt"></i> Keluar
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url() ?>" class="brand-link">
                <img src="<?= base_url() ?>src/backend/dist/img/logobirrunew.png" style="width:200px;height:63px;" class="logo">
                <!-- <span class="brand-text font-weight-light">iAset</span> -->
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <?php if ($this->session->userdata('role') == '1') : ?>

                            <li class="nav-item has-treeview">
                                <a href="<?= base_url('home') ?>" class="nav-link <?= isset($active_menu_db) ? $active_menu_db : '' ?>">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>

                            <!-- <li class="nav-item has-treeview">
                <a href="<?= base_url('statistik') ?>" class="nav-link <?= isset($active_menu_statistik) ? $active_menu_statistik : '' ?>">
                  <i class="nav-icon fas fa-chart-pie"></i>
                  <p>Statistik</p>
                </a>
              </li> -->

                            <li class="nav-item has-treeview <?= isset($active_menu_master) ? $active_menu_master : '' ?>">
                                <a href="#" class="nav-link <?= isset($active_menu_mst) ? $active_menu_mst : '' ?>">
                                    <i class="nav-icon fa fa-database"></i>
                                    <p>Master Data
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= base_url('satuan') ?>" class="nav-link <?= isset($active_menu_satuan) ? $active_menu_satuan : '' ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Satuan</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('kategori') ?>" class="nav-link <?= isset($active_menu_jb) ? $active_menu_jb : '' ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Kategori Barang</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('barang') ?>" class="nav-link <?= isset($active_menu_brg) ? $active_menu_brg : '' ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Barang</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('supplier') ?>" class="nav-link <?= isset($active_menu_supplier) ? $active_menu_supplier : '' ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Supplier</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('users') ?>" class="nav-link <?= isset($active_menu_user) ? $active_menu_user : '' ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>User</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item has-treeview <?= isset($active_menu_transaksi_masuk) ? $active_menu_transaksi_masuk : '' ?>">
                                <a href="#" class="nav-link <?= isset($active_menu_trns_msuk) ? $active_menu_trns_msuk : '' ?>">
                                    <i class="nav-icon fa fa-random"></i>
                                    <p>Transaksi
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= base_url('barangmasuk') ?>" class="nav-link <?= isset($active_menu_barangmasuk) ? $active_menu_barangmasuk : '' ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Barang Masuk</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('barangkeluar') ?>" class="nav-link <?= isset($active_menu_barangkeluar) ? $active_menu_barangkeluar : '' ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Barang Keluar</p>
                                        </a>
                                    </li>
                            </li>
                    </ul>
                    </li>


                    <li class="nav-item has-treeview">
                        <a href="<?= base_url('pengadaan') ?>" class="nav-link <?= isset($active_menu_pngdaan) ? $active_menu_pngdaan : '' ?>">
                            <i class="nav-icon fas fa-bookmark"></i>
                            <p>Pengadaan</p>
                        </a>
                    </li>

                    <!-- <li class="nav-item has-treeview">
                        <a href="<?= base_url('peminjaman') ?>" class="nav-link <?= isset($active_menu_pnjm) ? $active_menu_pnjm : '' ?>">
                            <i class="nav-icon fas fa-bookmark"></i>
                            <p>Peminjaman</p>
                        </a>
                    </li> -->

                    <li class="nav-item has-treeview <?= isset($active_menu_lp) ? $active_menu_lp : '' ?>">
                        <a href="#" class="nav-link <?= isset($active_menu_lpr) ? $active_menu_lpr : '' ?>">
                            <i class="nav-icon fa fa-file"></i>
                            <p>Laporan
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('laporan/barangmasuk') ?>" class="nav-link <?= isset($active_menu_brngmsuk) ? $active_menu_brngmsuk : '' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Laporan Barang Masuk</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('laporan/barangkeluar') ?>" class="nav-link <?= isset($active_menu_brgkeluar) ? $active_menu_brgkeluar : '' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Laporan Barang Keluar</p>
                                </a>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="<?= base_url('laporan/stokbarang') ?>" class="nav-link <?= isset($active_menu_stokbarang) ? $active_menu_stokbarang : '' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Laporan Stok Barang</p>
                                </a>
                            </li> -->

                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="<?= base_url('pengaturan') ?>" class="nav-link <?= isset($active_menu_png) ? $active_menu_png : '' ?>">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>Pengaturan</p>
                        </a>
                    </li>

                    <?php elseif ($this->session->userdata('role') == '2' || $this->session->userdata('role') == '3') : ?>

                        <li class="nav-item has-treeview">
                        <a href="<?= base_url('home') ?>" class="nav-link <?= isset($active_menu_db) ? $active_menu_db : '' ?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <?php if ($this->session->userdata('role') == '2') : ?>
                        <li class="nav-item has-treeview">
                        <a href="<?= base_url('pengadaan') ?>" class="nav-link <?= isset($active_menu_pngdaan) ? $active_menu_pngdaan : '' ?>">
                            <i class="nav-icon fas fa-bookmark"></i>
                            <p>Pengadaan</p>
                        </a>
                    </li>
                    <?php endif ?>
                    <li class="nav-item has-treeview <?= isset($active_menu_lp) ? $active_menu_lp : '' ?>">
                        <a href="#" class="nav-link <?= isset($active_menu_lpr) ? $active_menu_lpr : '' ?>">
                            <i class="nav-icon fa fa-file"></i>
                            <p>Laporan
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                            <a href="<?= base_url('laporan/barangmasuk') ?>" class="nav-link <?= isset($active_menu_brngmsuk) ? $active_menu_brngmsuk : '' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Laporan Barang Masuk</p>
                                </a>
                            </li>
                            <li class="nav-item">
                            <a href="<?= base_url('laporan/barangkeluar') ?>" class="nav-link <?= isset($active_menu_brgkeluar) ? $active_menu_brgkeluar : '' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Laporan Barang Keluar</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="<?= base_url('pengaturan') ?>" class="nav-link <?= isset($active_menu_png) ? $active_menu_png : '' ?>">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>Pengaturan</p>
                        </a>
                    </li>


                <?php elseif ($this->session->userdata('role') == '2' || $this->session->userdata('role') == '3') : ?>
                  
                    <li class="nav-item has-treeview">
                        <a href="<?= base_url('home') ?>" class="nav-link <?= isset($active_menu_db) ? $active_menu_db : '' ?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview <?= isset($active_menu_lp) ? $active_menu_lp : '' ?>">
                        <a href="#" class="nav-link <?= isset($active_menu_lpr) ? $active_menu_lpr : '' ?>">
                            <i class="nav-icon fa fa-file"></i>
                            <p>Laporan
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                            <a href="<?= base_url('laporan/barangmasuk') ?>" class="nav-link <?= isset($active_menu_brngmsuk) ? $active_menu_brngmsuk : '' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Laporan Barang Masuk</p>
                                </a>
                            </li>
                            <li class="nav-item">
                            <a href="<?= base_url('laporan/barangkeluar') ?>" class="nav-link <?= isset($active_menu_brgkeluar) ? $active_menu_brgkeluar : '' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Laporan Barang Keluar</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="<?= base_url('pengaturan') ?>" class="nav-link <?= isset($active_menu_png) ? $active_menu_png : '' ?>">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>Pengaturan</p>
                        </a>
                    </li>

                <?php else : ?>
                    <li class="nav-item has-treeview">
                        <a href="<?= base_url('home') ?>" class="nav-link <?= isset($active_menu_db) ? $active_menu_db : '' ?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('barang') ?>" class="nav-link <?= isset($active_menu_brg) ? $active_menu_brg : '' ?>">
                            <i class="nav-icon fa fa-cubes"></i>
                            <p>Barang</p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview <?= isset($active_menu_amprah_barang) ? $active_menu_amprah_barang : '' ?>">
                        <a href="#" class="nav-link <?= isset($active_menu_amba) ? $active_menu_amba : '' ?>">
                            <i class="nav-icon fa fa-upload"></i>
                            <p>Amprah Barang
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('amprahbarang') ?>" class="nav-link <?= isset($active_menu_amprahbarang) ? $active_menu_amprahbarang : '' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Buat Permintaan Barang</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('amprahbarang/daftaramprahbelumacc') ?>" class="nav-link <?= isset($active_menu_daftaramprahbarangbelumacc) ? $active_menu_daftaramprahbarangbelumacc : '' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Amprah Barang Belum ACC</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('amprahbarang/daftaramprah') ?>" class="nav-link <?= isset($active_menu_daftaramprahbarang) ? $active_menu_daftaramprahbarang : '' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Amprah Barang ACC</p>
                                </a>
                            </li>
                        </ul>
                    <li class="nav-item has-treeview">
                        <a href="<?= base_url('pengaturan') ?>" class="nav-link <?= isset($active_menu_png) ? $active_menu_png : '' ?>">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>Pengaturan</p>
                        </a>
                    </li>
                    </li>
                <?php endif ?>
                </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>