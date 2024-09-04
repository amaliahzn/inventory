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
                        <li class="breadcrumb-item"><a href="#">Data Peminjaman</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('barang') ?>">Peminjaman</a></li>
                        <li class="breadcrumb-item active">Tambah Data Peminjaman</li>
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
                <h3 class="card-title">Form Tambah</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="<?= base_url('peminjaman/simpan') ?>" autocomplete="off" method="post">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="nama_barang" class="col-sm-2 col-form-label">Kode peminjaman</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="kd_peminjaman" placeholder="" value="<?= $kd_peminjaman ?>" readonly required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="nama" placeholder="Masukan No Invoice / Nota .." required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control" name="tanggal_pinjam" value="<?= date("d-m-Y") ?>" placeholder=".." required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Kembali</label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control" name="tanggal_kembali" placeholder=".." required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="keterangan" placeholder="Masukan keterangan atau Boleh dikosongkan">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="<?= base_url('peminjaman') ?>">
                            <button type="button" class="btn btn-danger">Kembali</button>
                        </a>
                        <button type="submit" class="btn btn-info">Simpan</button>
                    </div>
                    <!-- /.card-footer -->
                </form>
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