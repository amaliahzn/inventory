<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Barang</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Data Master</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('barang') ?>">Barang</a></li>
            <li class="breadcrumb-item active">Ubah Data</li>
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
        <h3 class="card-title">Form Ubah Data Barang</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
      </div>
      <div class="card-body">
        <?php foreach ($brg as $row) : ?>
          <form class="form-horizontal" action="<?= base_url('barang/ubah') ?>" autocomplete="off" method="post">
            <input type="hidden" name="id_barang" value="<?= $row['id_barang']; ?>">
            <div class="card-body">
              <div class="form-group row">
                <label for="kd_barang" class="col-sm-2 col-form-label">kd_barang</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" value="<?= $row['kd_barang']; ?>" name="kd_barang" readonly required>
                </div>
              </div>
              <div class="form-group row">
                <label for="nama_kategori" class="col-sm-2 col-form-label">Kategori Barang</label>
                <div class="col-sm-6">
                  <select name="nama_kategori" class="select2 form-control" required>
                    <option value="">- Pilih --</option>
                    <?php foreach ($kategori as $x) : ?>
                      <option <?php if ($x['nama_kategori'] == $row['nama_kategori']) {
                                echo 'selected="selected"';
                              } ?> value="<?= $x['nama_kategori']; ?>"><?= $x['nama_kategori']; ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" value="<?= $row['nama_barang']; ?>" name="nama_barang" placeholder="Masukan Nama Barang.." required>
                </div>
              </div>
              <div class="form-group row">
                <label for="nama_satuan" class="col-sm-2 col-form-label">Satuan</label>
                <div class="col-sm-6">
                  <select name="nama_satuan" class="select2 form-control" required>
                    <option value="">- Pilih --</option>
                    <?php foreach ($satuan as $x) : ?>
                      <option <?php if ($x['nama_satuan'] == $row['nama_satuan']) {
                                echo 'selected="selected"';
                              } ?> value="<?= $x['nama_satuan']; ?>"> <?= $x['nama_satuan']; ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
              <!-- <div class="form-group row">
                <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-6">
                  <input type="text" id="dengan-rupiah" class="form-control" value="<?= $row['harga'] ?>" name="harga" required>
                </div>
              </div> -->
              <!--<div class="form-group row">
                <label for="stok_minimal" class="col-sm-2 col-form-label">stok_minimal</label>
                <div class="col-sm-6">
                  <input type="number" class="form-control" value="<?= $row['stok_minimal']; ?>" name="stok_minimal" required>
                </div>
              </div>-->
              <div class="form-group row">
                <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" value="<?= $row['keterangan']; ?>" placeholder="Isi Keterangan atau boleh dikosongkan" name="keterangan">
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <a href="<?= base_url('barang') ?>">
                <button type="button" class="btn btn-danger">Kembali</button>
              </a>
              <button type="submit" class="btn btn-info">Simpan</button>
            </div>
            <!-- /.card-footer -->
          </form>
        <?php endforeach ?>
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
<!-- /.content-wrapper -->