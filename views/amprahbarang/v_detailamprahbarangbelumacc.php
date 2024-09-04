<link rel="stylesheet" href="<?= base_url() ?>src/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Konfirmasi Data Permintaan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Permintaan Barang</a></li>
            <li class="breadcrumb-item active">Detail Data Permintaan</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('sukses'); ?>"></div>
  <div class="flash-data-gagal" data-flashdatagagal="<?= $this->session->flashdata('gagal'); ?>"></div>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <a href="<?= base_url('amprahbarang/daftaramprahbelumacc') ?>" class="btn btn-block bg-gradient-primary">
            Kembali </a>
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
        <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No.</th>
                <th>Kd Barang</th>
                <th>Nama Barang</th>
                <th>Satuan</th>
                <th>Kategori</th>
                <th>Jumlah</th>
                <th>Status Kasubag</th>
                <th>Status Kabag</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($detailpermintaanbelumacc as $row) : ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $row['kd_barang']; ?></td>
                  <td><?= $row['nama_barang']; ?></td>
                  <td><?= $row['nama_satuan']; ?></td>
                  <td><?= $row['nama_kategori']; ?></td>
                  <td><?= $row['jumlah']; ?></td>
                  <td>
                    <?php
                    if ($row['status_kasubag'] == 0) {
                      echo '<span class=text-warning>Menunggu Persetujuan</span>';
                    } elseif ($row['status_kasubag'] == 1) {
                      echo '<span class=text-primary>Telah Disetujui</span>';
                    } else {
                      echo '<span class=text-danger>Tidak Disetujui</span>';
                    }
                    ?>
                  </td>
                  <td>
                    <?php
                    if ($row['status_kabag'] == 0) {
                      echo '<span class=text-warning>Menunggu Persetujuan</span>';
                    } elseif ($row['status_kabag'] == 1) {
                      echo '<span class=text-primary>Telah Disetujui</span>';
                    } else {
                      echo '<span class=text-danger>Tidak Disetujui</span>';
                    }
                    ?>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
            <tfoot>
              <tr>
                <th>No.</th>
                <th>Kd Barang</th>
                <th>Nama Barang</th>
                <th>Satuan</th>
                <th>Kategori</th>
                <th>Jumlah</th>
                <th>Status Kasubag</th>
                <th>Status Kabag</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">

      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->

  <!-- Modal Ubah -->

</div>
<script src="<?= base_url() ?>src/backend/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>src/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
  $(function() {
    $("#example1").DataTable({
      "language": {
        "zeroRecords": "Data masih kosong",
        "sSearch": "Cari"
      }
    });
  });
</script>