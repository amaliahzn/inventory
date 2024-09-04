<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Pengajuan Pengadaan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('pengadaan') ?>">Pengadaan</a></li>
                        <li class="breadcrumb-item active">Tambah Pengajuan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('sukses'); ?>"></div>
    <div class="flash-data-gagal" data-flashdatagagal="<?= $this->session->flashdata('gagal'); ?>"></div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <!-- /.card-header -->
                    </div>
                    <!-- /.card-body -->
                    <!-- /.card-header -->
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Pengadaan</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?php if ($this->session->userdata('role') == '1' || $this->session->userdata('role') == '2') : ?>
                        <?php endif ?>
                        <form class="form-horizontal" action="<?= base_url('pengadaan/simpan') ?>" autocomplete="off" method="post" enctype="multipart/form-data">
                            <div class=" card-body">
                                <div class="form-group row">
                                    <label for="nama_barang" class="col-sm-2 col-form-label">Kode Pengadaan</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="kd_pengadaan" placeholder="" value="<?= $kd_pengadaan ?>" readonly required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_pengaju" class="col-sm-2 col-form-label">Nama Pengaju</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="nama_pengaju" placeholder="Masukan Nama Pengaju.." required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tanggal permintaan" class="col-sm-2 col-form-label">tanggal permintaan</label>
                                    <div class="col-sm-6">
                                        <input type="date" class="form-control" name="tgl_permintaan" min="0" placeholder="Masukan tanggal permintaan.." required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="tanggal dibutuhkan" class="col-sm-2 col-form-label">tanggal Dibutuhkan</label>
                                    <div class="col-sm-6">
                                        <input type="date" class="form-control" name="tgl_dibutuhkan" min="0" placeholder="Masukan tanggal Dibutuhkan.." required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="keterangan" placeholder="Masukan Keterangan.." required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="status_pengadaan" class="col-sm-2 col-form-label">Status Pengajuan</label>
                                    <div class="col-sm-6">
                                        <select name="status_pengadaan" class="select2 form-control" required>
                                            <option value="" disabled>- Pilih --</option>
                                            <option value="Menunggu">Menunggu</option>
                                            <option value="Disetujui">Disetujui</option>
                                            <option value="Diproses">Diproses</option>
                                            <option value="Selesai">Selesai</option>
                                            <option value="DiTolak">DiTolak</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <div class="col-2">

                                </div>
                                <div class="col-6">
                                    <button type="submit" class="btn btn-info">Simpan</button>
                                </div>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.id_lokasi').select2({
            theme: "classic"
        });
    });
</script>