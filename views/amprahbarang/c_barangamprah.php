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
                        <li class="breadcrumb-item"><a href="#">Data Amprah</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('barang') ?>">Amprah Barang</a></li>
                        <li class="breadcrumb-item active">Tambah Data Amprah Barang</li>
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
                <h3 class="card-title">Form Tambah Data</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="<?= base_url('amprahbarang/simpan') ?>" autocomplete="off" method="post">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="kode_amprah" class="col-sm-2 col-form-label">Kode Amprah</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="kd_amprah" placeholder="" value="<?= $kd_amprah ?>" readonly required>
                            </div>
                        </div>
                        <?php foreach ($user as $row) : ?>
                        <div class="form-group row">
                            <label for="nama_supplier" class="col-sm-2 col-form-label">Nama User</label>
                            <div class="col-sm-6">
                            <input type="text" class="form-control" name="nama" value="<?= $row['nama_user'] ?>" placeholder=".." readonly required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_supplier" class="col-sm-2 col-form-label">Ruangan</label>
                            <div class="col-sm-6">
                            <input type="text" class="form-control" name="ruangan" value="<?= $row['ruangan'] ?>" placeholder=".." readonly required>
                            </div>
                        </div>
                        <?php endforeach ?>
                        <!-- <div class="form-group row">
                            <label for="nama_baranf" class="col-sm-2 col-form-label">Nama Barang</label>
                            <div class="col-sm-6">
                                <select name="nama_baranf" class="form-control" required>
                                    <option value="">- Pilih --</option>
                                    <?php foreach ($barang as $row) : ?>
                                        <option value="<?= $row['nama_barang']; ?>"><?= $row['kd_barang']; ?> - <?= $row['nama_barang']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div> -->

                        
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