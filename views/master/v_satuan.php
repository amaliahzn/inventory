<link rel="stylesheet" href="<?= base_url() ?>src/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Satuan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Data Master</a></li>
            <li class="breadcrumb-item active">Satuan</li>
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
          <button type="button" data-toggle="modal" data-target="#modal-default" class="btn btn-block bg-gradient-primary">Tambah Satuan</button>
        </h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama Satuan</th>
                <th>Keterangan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($satuan as $row) : ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $row['nama_satuan']; ?></td>
                  <td><?= $row['keterangan']; ?></td>
                  <td>
                    <a href="#" data-toggle="modal" data-target="#modal-ubah<?= $row['id_satuan']; ?>">
                      <button type="button" class="btn btn-info btn-sm">
                        <i class="fas fa-edit"></i>
                      </button>
                    </a>
                    <a href="<?= base_url('satuan/hapus/' . $row['id_satuan']) ?>" class="btn btn-danger btn-sm tombol-hapus">
                      <i class="fas fa-trash"></i>
                    </a>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
            <tfoot>
              <tr>
                <th>No.</th>
                <th>Nama Satuan</th>
                <th>Keterangan</th>
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
  <!-- Modal Tambah -->
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Data Satuan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="<?= base_url('satuan/simpan') ?>" autocomplete="off" method="post">
            <div class="form-group row">
              <label for="nama_Satuan" class="col-sm-6 col-form-label">Nama Satuan</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" placeholder="Nama Satuan.." name="nama_Satuan" required autofocus>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <label for="keterangan" class="col-sm-4 col-form-label">Keterangan</label>
                <input type="text" class="form-control" placeholder="Ketik Keterangan.." name="keterangan" required>
              </div>
            </div>
            <!-- /.card-body -->
        </div>
        <div class="modal-footer content-between">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
      <!-- /.modal-content -->
      </form>
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal tambah -->
  <!-- Modal Ubah -->
  <?php
  $no = 1;
  foreach ($satuan as $row) :

  ?>
    <div class="modal fade" id="modal-ubah<?= $row['id_satuan']; ?>">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Ubah Data Satuan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" action="<?= base_url('satuan/ubah') ?>" autocomplete="off" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id_satuan" value="<?= $row['id_satuan']; ?>">
              <div class="form-group">
                <label for="Nama Satuan" class="col-sm-6 col-form-label">Nama Satuan</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" value="<?= $row['nama_satuan']; ?>" placeholder="Ketik Satuan" name="nama_satuan" required>
                </div>
              </div>
              <div class="form-group">
                <label for="keterangan" class="col-sm-6 col-form-label">Keterangan</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" value="<?= $row['keterangan'] ?>" placeholder="Nama Keterangan.." name="keterangan">
                </div>
              </div>
              <!-- /.card-body -->
          </div>
          <div class="modal-footer content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Ubah</button>
          </div>
        </div>
        <!-- /.modal-content -->
        </form>
      </div>
      <!-- /.modal-dialog -->
    </div>
  <?php endforeach ?>
  <!-- /.modal Ubah -->
</div>
<script src="<?= base_url() ?>src/backend/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>src/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
  $(function() {
    $("#example1").DataTable({
      "language": {
        "sSearch": "Cari"
      }
    });
  });
</script>