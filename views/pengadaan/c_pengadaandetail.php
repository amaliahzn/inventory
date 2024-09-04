<div class="content-wrapper" id="pengadaan">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data pengadaan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pengadaan</a></li>
                        <li class="breadcrumb-item active">Tambah Data Pengadaan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="flash-data" id="flash" data-flashdata="<?= $this->session->flashdata('sukses'); ?>"></div>
    <div class="flash-data-gagal" data-flashdatagagal="<?= $this->session->flashdata('gagal'); ?>"></div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Data Header Pengadaan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php
                            foreach ($pengadaan as $row) : ?>
                                <div class="form-group row">
                                    <label for="nama_barang" class="col-sm-4 col-form-label">Kode pengadaan </label>
                                    <label for="nama_barang" class="col-sm-4 col-form-label">: <?= $row['kd_pengadaan'] ?></label>
                                </div>
                                <div class="form-group row">
                                    <br>
                                    <label for="g" class="col-sm-4 ">Nama Pengaju</label>
                                    <label for="nama_barang" class="col-sm-4">: <?= $row['nama_pengaju'] ?></label>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_barang" class="col-sm-4 ">Tanggal Permintaan: </label>
                                    <label for="nama_barang" class="col-sm-4">: <?= $row['tgl_permintaan'] ?></label>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_barang" class="col-sm-4 ">Tanggal Dibutuhkan : </label>
                                    <label for="nama_barang" class="col-sm-4">: <?= $row['tgl_dibutuhkan'] ?></label>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_barang" class="col-sm-4 ">Status : </label>
                                    <label for="nama_barang" class="col-sm-4">: <?= $row['status_pengadaan'] ?></label>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_barang" class="col-sm-4 ">Keterangan : </label>
                                    <label for="nama_barang" class="col-sm-4">: <?= $row['keterangan'] ?></label>
                                </div>
                            <?php endforeach ?>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">
                    <!-- general form elements disabled -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Detail Barang</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <h3 class="card-title">
                                <div id="notif" class="alert alert-danger" style="display:none;"></div>
                                <a href="#" data-toggle="modal" data-target="#modal-tambah" class="btn btn-info btn-sm">
                                    <i class="fas fa-edit"></i> Tambah Barang
                                </a>
                            </h3>
                            <table class="table table-bordered">
                                <thead>
                                    <th>No.</th>
                                    <th>Nama Barang</th>
                                    <th>Satuan</th>
                                    <th>Kategori</th>
                                    <th>Jumlah</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($barangpengadaandetail as $row) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $row['nama_barang'] ?></td>
                                            <td><?= $row['nama_satuan'] ?></td>
                                            <td><?= $row['nama_kategori'] ?></td>
                                            <td><?= $row['jumlah'] ?></td>
                                            <td>
                                                <!-- <a href="<?= base_url('pengadaan/hapusdetail/' . $row['id'])  ?>" class="btn btn-danger btn-xs tombol-hapus">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </a> -->
                                                <a href="#" onclick="hapus('<?php echo $row['id']; ?>')" title="Hapus Data Barang" class="btn btn-xs btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- Modal Ubah Spesfikasi-->

<!-- /.modal Ubah Spesfikasi-->

<!-- Modal Ubah Kualitas-->


<!-- Modal Tambah -->
<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="<?= base_url('pengadaan/simpandetail') ?>" autocomplete="off" method="post">
                    <div class="form-group row">
                        <input type="hidden" name="kd_pengadaan" value="<?= $row['kd_pengadaan']; ?>">
                        <label for="nama_barang" class="col-sm-6 col-form-label">Nama barang</label>
                        <div class="col-sm-12">
                            <select name="nama_barang" class="select2 form-control" style="width: 100%" required>
                                <option value="">- Pilih --</option>
                                <?php foreach ($barang as $row) : ?>
                                    <option value="<?= $row['nama_barang']; ?>"> <?= $row['nama_barang']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-6 col-form-label">Kategori</label>
                        <div class="col-sm-12">
                            <select name="nama_kategori" class="select2 form-control" style="width: 100%" required>
                                <option value="">- Pilih --</option>
                                <?php foreach ($kategori as $row) : ?>
                                    <option value="<?= $row['nama_kategori']; ?>"> <?= $row['nama_kategori']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-6 col-form-label">Satuan</label>
                        <div class="col-sm-12">
                            <select name="nama_satuan" class="select2 form-control" style="width: 100%" required>
                                <option value="">- Pilih --</option>
                                <?php foreach ($satuan as $row) : ?>
                                    <option value="<?= $row['nama_satuan']; ?>"> <?= $row['nama_satuan']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="jumlah" class="col-sm-4 col-form-label">Jumlah</label>
                            <input type="number" class="form-control" placeholder="Ketik jumlah.." name="jumlah" required>
                        </div>
                    </div>
                    <?php
                    foreach ($pengadaan as $row) : ?>
                        <input type="hidden" name="nama_pengaju" value="<?= $row['nama_pengaju']; ?>">
                        <input type="hidden" name="kd_pengadaan" value="<?= $row['kd_pengadaan']; ?>">
                        <input type="hidden" name="tgl_permintaan" value="<?= $row['tgl_permintaan']; ?>">
                        <input type="hidden" name="tgl_dibutuhkan" value="<?= $row['tgl_dibutuhkan']; ?>">
                        <input type="hidden" name="keterangan" value="<?= $row['keterangan']; ?>">
                        <input type="hidden" name="status_pengadaan" value="<?= $row['status_pengadaan']; ?>">
                    <?php endforeach ?>
                    <!-- <?php foreach ($barang as $row) : ?>
                        <input type="hidden" name="kd_barang" value="<?= $row['kd_barang']; ?>">
                        <input type="hidden" name="nama_satuan" value="<?= $row['nama_satuan']; ?>">
                        <input type="hidden" name="nama_kategori" value="<?= $row['nama_kategori']; ?>">
                    <?php endforeach ?> -->

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

<!-- /.modal Ubah Kualitas-->
<script type="text/javascript">
    function hapus(id) {
        if (confirm('Yakin mau menghapus data ini?')) {
            $(document).ready(function() {
                $.ajax({
                    url: '<?php echo site_url(); ?>/pengadaan/hapusdetail/' + id,
                    success: function() {
                        $("#notif").html('Data berhasil dihapus');
                        $("#notif").fadeIn(2500);
                        $("#notif").fadeOut(2500);
                        window.location.reload();
                    }
                });
            });
        }
    }
</script>