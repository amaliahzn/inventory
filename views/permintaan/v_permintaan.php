<link rel="stylesheet" href="<?= base_url() ?>src/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Permintaan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Data Permintaan</a></li>
            <li class="breadcrumb-item active">Permintaan</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <?php if ($this->session->flashdata('gagal_store')) { ?>
    <div class="alert alert-danger col-md-12">
      <?= $this->session->flashdata('gagal_store') ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php } ?>

  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('sukses'); ?>"></div>
  <div class="flash-data-gagal" data-flashdatagagal="<?= $this->session->flashdata('gagal'); ?>"></div>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <!-- <a href="<?= base_url('Permintaan/tambah') ?>" class="btn btn-block bg-gradient-primary">
            Tambah Permintaan
          </a> -->
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
                <th>Tgl Permintaan</th>
                <th>Nama</th>
                <th>Ruangan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php if ($this->session->userdata('role') == '3') : ?>

                <?php
                $no = 1;
                foreach ($permintaan as $row) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= tgl_indo($row['tgl_permintaan']); ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['ruang']; ?></td>
                    <td>
                      <a href="<?= base_url('permintaanbarang/detail/' . $row['tgl_permintaan'] . '/' . $row['ruang']) ?>" class="btn btn-info btn-sm">
                        <i class="fas fa-eye"> Detail Permintaan</i>
                      </a>
                    </td>
                  </tr>
                <?php endforeach ?>
              <?php else : ?>

                <?php
                $no = 1;
                foreach ($permintaankabag as $row) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= tgl_indo($row['tgl_permintaan']); ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['ruang']; ?></td>
                    <td>
                      <a href="<?= base_url('permintaanbarang/detail/' . $row['tgl_permintaan'] . '/' . $row['ruang']) ?>" class="btn btn-info btn-sm">
                        <i class="fas fa-eye"> Detail Permintaan</i>
                      </a>
                    </td>
                  </tr>
                <?php endforeach ?>

              <?php endif ?>

            </tbody>
            <tfoot>
              <tr>
                <th>No.</th>
                <th>Tgl Permintaan</th>
                <th>Nama</th>
                <th>Ruangan</th>
                <th>Aksi</th>
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