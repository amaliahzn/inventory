<link rel="stylesheet" href="<?= base_url() ?>src/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Detail Amprah Barang</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Amprah Barang</a></li>
            <li class="breadcrumb-item active">Detail Data Amprah Barang</li>
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
          <a href="<?= base_url('amprahbarang/daftaramprah') ?>" class="btn btn-block bg-gradient-primary">
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
                <!-- <th>Aksi</th> -->
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($detailpermintaan as $row) : ?>
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
                <th>Status Kabid</th>
                <!-- <th>Aksi</th> -->
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
  <?php
  $no = 1;
  foreach ($detailpermintaan as $row) :

  ?>
    <div class="modal fade" id="modal-ubah<?= $row['id']; ?>">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Ubah Detail Data Permintaan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" action="<?= base_url('permintaanbarang/ubah') ?>" autocomplete="off" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?= $row['id']; ?>">
              <div class="form-group">
                <label for="Nama Satuan" class="col-sm-6 col-form-label">Nama</label>
                <div class="col-sm-12">
                  <input type="hidden" class="form-control" value="<?= $row['tgl_permintaan']; ?>" name="tgl_permintaan">
                  <input type="text" class="form-control" value="<?= $row['nama']; ?>" name="nama" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="Nama Satuan" class="col-sm-6 col-form-label">Ruangan</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" value="<?= $row['ruang']; ?>" name="ruang" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="nama_barang" class="col-sm-6 col-form-label">Nama barang</label>
                <div class="col-sm-12">
                  <select name="nama_barang" class="select2 form-control" style="width: 100%" required>
                    <option value="">- Pilih --</option>
                    <?php foreach ($barang as $x) : ?>
                      <option <?php if ($x['nama_barang'] == $row['nama_barang']) {
                                echo 'selected="selected"';
                              } ?> value="<?= $x['nama_barang']; ?>"> <?= $x['nama_barang']; ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="Nama Satuan" class="col-sm-6 col-form-label">Jumlah</label>
                <div class="col-sm-12">
                  <input type="number" class="form-control" value="<?= $row['jumlah']; ?>" name="jumlah" autofocus>
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