<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Laporan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Laporan</a></li>
            <li class="breadcrumb-item active">Data Barang Keluar</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div class="flash-data-gagal" data-flashdatagagal="<?= $this->session->flashdata('gagal'); ?>"></div>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          Cari Data Barang Keluar
        </h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <form action="<?= base_url('laporan/search_barangkeluar') ?>" method="post">
          <div class="row">
            <div class="col-4">
              <input type="date" name="tanggal_awal" class="form-control">
            </div>
            <div class="col-4">
              <input type="date" name="tanggal_akhir" class="form-control">
            </div>
            <div class="col">
              <button type="submit" class="btn btn-block btn-outline-primary">Cari</button>
            </div>
            <div class="col">
              <button type="reset" class="btn btn-block btn-outline-danger">Reset</button>
            </div>
          </div>
        </form>
        <button type="button" class="btn btn-danger mt-4" disabled>
          <i class="fa fa-print" aria-hidden="true"></i> Print
        </button>
        <button type="button" class="btn btn-success mt-4" disabled>
          <i class="fa fa-file" aria-hidden="true"></i> Export Excel
        </button>
        <table class="table table-bordered mt-4">
          <thead>
            <tr>
              <th>No.</th>
              <th>Kd Transaksi</th>
              <th>No Delivery Order</th>
              <th>Nama Supplier</th>
              <th>Tanggal Keluar</th>
              <!--<th>KdBarang</th>-->
              <th>Nama Barang</th>
              <th>Kategori</th>
              <th>Jumlah</th>
              <th>Satuan</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td colspan="12" align="center">Data tidak tersedia.. silahkan cari data</td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">

      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>