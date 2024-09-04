  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <!-- Breadcumb Saya Hapus
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><
        </div>
      </div>
      -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <!--
        <div class="alert alert-info">
            <h5> 
              <?php

                date_default_timezone_set("Asia/Jakarta");

                $b = time();
                $hour = date("G", $b);

                if ($hour >= 0 && $hour <= 11) {
                    echo '<i class="icon fas fa-cloud-sun"></i>';
                    echo " Selamat Pagi.. " . $this->session->userdata('nama_user');
                } else if ($hour >= 12 && $hour <= 14) {
                    echo '<i class="icon far fa-sun"></i>';
                    echo " Selamat Siang.. " . $this->session->userdata('nama_user');
                } else if ($hour >= 15 && $hour <= 17) {
                    echo '<i class="icon far fa-sun"></i>';
                    echo " Selamat Sore.. " . $this->session->userdata('nama_user');
                } else if ($hour >= 17 && $hour <= 18) {
                    echo '<i class="icon fas fa-cloud"></i>';
                    echo " Selamat Petang.. " . $this->session->userdata('nama_user');
                } else if ($hour >= 19 && $hour <= 23) {
                    echo '<i class="icon fas fa-cloud-moon"></i>';
                    echo " Selamat Malam.. " . $this->session->userdata('nama_user');
                }

                ?>

            </h5>
            Selamat Datang di Website Sistem Informasi Inventarisasi Aset 
          </div>
          -->
              <?php if ($this->session->userdata('role') == '1' || $this->session->userdata('role') == '2'
              || $this->session->userdata('role') == '3') : ?>
                  <div class="row">
                      <div class="col-lg-4 col-6">
                          <!-- small box -->
                          <div class="small-box bg-info">
                              <div class="inner">
                                  <h3><?= $satuan; ?></h3>

                                  <p>Total Satuan</p>
                              </div>
                              <div class="icon">
                                  <i class="ion ion-android-home"></i>
                              </div>
                              <?php if ($this->session->userdata('role') == '1' || $this->session->userdata('role') == '') : ?>
                              <a href="<?= base_url('satuan') ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                              <?php endif ?>
                          </div>
                      </div>
                      <div class="col-lg-4 col-6">
                          <!-- small box -->
                          <div class="small-box bg-yellow">
                              <div class="inner">
                                  <h3><?= $kategori; ?></h3>

                                  <p>Total kategori</p>
                              </div>
                              <div class="icon">
                                  <i class="ion ion-pricetag"></i>
                              </div>
                              <?php if ($this->session->userdata('role') == '1' || $this->session->userdata('role') == '') : ?>
                              <a href="<?= base_url('kategori') ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                              <?php endif ?>
                          </div>
                      </div>
                      <div class="col-lg-4 col-6">
                          <!-- small box -->
                          <div class="small-box bg-success">
                              <div class="inner">
                                  <h3><?= $supplaier; ?></h3>
                                  <p>Total supplaier</p>
                              </div>
                              <div class="icon">
                                  <i class="ion ion-stats-bars"></i>
                              </div>
                              <?php if ($this->session->userdata('role') == '1' || $this->session->userdata('role') == '') : ?>
                              <a href="<?= base_url('supplier') ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                              <?php endif ?>
                          </div>
                      </div>
                      <div class="col-lg-4 col-6">
                          <!-- small box -->
                          <div class="small-box bg-dark">
                              <div class="inner">
                                  <h3><?= $user; ?></h3>

                                  <p>Total user</p>
                              </div>
                              <div class="icon">
                                  <i class="ion ion-lock-combination"></i>
                              </div>
                              <?php if ($this->session->userdata('role') == '1' || $this->session->userdata('role') == '') : ?>
                              <a href="<?= base_url('users') ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                              <?php endif ?>
                          </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-4 col-6">
                          <!-- small box -->
                          <div class="small-box bg-secondary">
                              <div class="inner">
                                  <h3><?= $barang; ?></h3>

                                  <p>Total Barang</p>
                              </div>
                              <div class="icon">
                                  <i class="ion ion-android-desktop"></i>
                              </div>
                              <?php if ($this->session->userdata('role') == '1' || $this->session->userdata('role') == '') : ?>
                              <a href="<?= base_url('barang') ?>" class="small-box-footer">Selengkapnya
                                  <i class="fas fa-arrow-circle-right"></i>
                              </a>
                              <?php endif ?>
                          </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-4 col-6">
                          <!-- small box -->
                          <div class="small-box bg-danger">
                              <div class="inner">
                                  <h3><?= $barangmasuk; ?></h3>

                                  <p>Total Barang Masuk</p>
                              </div>
                              <div class="icon">
                                  <i class="ion ion-pie-graph"></i>
                              </div>
                              <?php if ($this->session->userdata('role') == '1' || $this->session->userdata('role') == '') : ?>
                              <a href="<?= base_url('barangmasuk') ?>" class="small-box-footer">Selengkapnya
                                  <i class="fas fa-arrow-circle-right"></i>
                              </a>
                              <?php endif ?>
                          </div>
                      </div>
                      <div class="col-lg-4 col-6">
                          <!-- small box -->
                          <div class="small-box bg-primary">
                              <div class="inner">
                                  <h3><?= $barangkeluar; ?></h3>

                                  <p>Total Barang Keluar</p>
                              </div>
                              <div class="icon">
                                  <i class="ion ion-trophy"></i>
                              </div>
                              <?php if ($this->session->userdata('role') == '1' || $this->session->userdata('role') == '') : ?>
                              <a href=" <?= base_url('barangkeluar') ?>" class="small-box-footer">Selengkapnya
                                  <i class="fas fa-arrow-circle-right"></i>
                              </a>
                              <?php endif ?>
                          </div>
                      </div>
                      <div class="col-lg-4 col-6">
                          <!-- small box -->
                          <div class="small-box bg-primary">
                              <div class="inner">
                                  <h3><?= $pengadaan; ?></h3>

                                  <p>Total Pengadaan</p>
                              </div>
                              <div class="icon">
                                  <i class="ion ion-folder"></i>
                              </div>
                              <?php if ($this->session->userdata('role') == '1' || $this->session->userdata('role') == '2') : ?>
                              <a href=" <?= base_url('pengadaan') ?>" class="small-box-footer">Selengkapnya
                                  <i class="fas fa-arrow-circle-right"></i>
                              </a>
                              <?php endif ?>
                          </div>
                      </div>

                      <!-- ./col -->
                  </div>
              <?php endif ?>
              <!-- Small boxes (Stat box) -->
              <!-- /.row (main row) -->

              <!-- <img src="<?= base_url('src/aset.jpg') ?>" width="100%" /> -->
              <div class="row">
                  <div class="col-md-6">


                      <!-- /.card -->

                  </div>
                  <!-- /.col (LEFT) -->

                  <!-- /.col (RIGHT) -->
              </div>

          </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php
    // foreach ($kondisi as $row) {
    //   $kon[] = $row->kon;
    // }

    // foreach ($ktgr as $row) {
    //   $nama_kategori[] = $row->nama_kategori;
    // }

    // foreach ($kode as $data) {
    //   $kategori[] = (float) $data->kategori;
    // }
    ?>


  <script src="<?= base_url() ?>src/backend/plugins/chart.js/Chart.min.js"></script>
  <script>
      $(function() {

          //Grafik Kondisi Aset
          var donutData = {
              labels: [
                  'Baik',
                  'Renovasi',
                  'Rusak'
              ],
              datasets: [{
                  data: <?= json_encode($kon); ?>,
                  backgroundColor: ['#00a65a', '#f39c12', '#f56954'],
              }]
          }

          var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
          var pieData = donutData;
          var pieOptions = {
              maintainAspectRatio: false,
              responsive: true,
          }

          var pieChart = new Chart(pieChartCanvas, {
              type: 'pie',
              data: pieData,
              options: pieOptions
          })

          //Grafik Jenis Aset
          var jenisData = {
              labels: [
                  'Berwujud',
                  'Dihapuskan'
              ],
              datasets: [{
                  data: [<?= $bw; ?>, <?= $ph; ?>],
                  backgroundColor: ['#00c0ef', '#f56954'],
              }]
          }

          var jenisCanvas = $('#pieJenis').get(0).getContext('2d')
          var pieJenisData = jenisData;
          var jenisOptions = {
              maintainAspectRatio: false,
              responsive: true,
          }

          var pieJenis = new Chart(jenisCanvas, {
              type: 'pie',
              data: pieJenisData,
              options: jenisOptions
          })

          //Grafik Aset Kategori
          var areaChartData = {
              labels: <?= json_encode($nama_kategori); ?>,
              datasets: [{
                  label: 'Jumlah Aset',
                  backgroundColor: 'rgba(60,141,188,0.9)',
                  borderColor: 'rgba(60,141,188,0.8)',
                  pointRadius: false,
                  pointColor: '#3b8bba',
                  pointStrokeColor: 'rgba(60,141,188,1)',
                  pointHighlightFill: '#fff',
                  pointHighlightStroke: 'rgba(60,141,188,1)',
                  data: <?= json_encode($kategori); ?>
              }, ]
          }

          var barChartCanvas = $('#barChart').get(0).getContext('2d')
          var barChartData = jQuery.extend(true, {}, areaChartData)
          var temp0 = areaChartData.datasets[0]
          barChartData.datasets[0] = temp0

          var barChartOptions = {
              responsive: true,
              maintainAspectRatio: false,
              datasetFill: false
          }

          var barChart = new Chart(barChartCanvas, {
              type: 'bar',
              data: barChartData,
              options: barChartOptions
          })


      })
  </script>