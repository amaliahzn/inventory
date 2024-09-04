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
                        <li class=" breadcrumb-item active"><a href="<?= base_url('barangkeluar') ?>">Transaksi</a></li>
                        <li class="breadcrumb-item active"><a href="<?= base_url('barangkeluar') ?>">Barang Keluar</a></li>

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
                <form class="form-horizontal" action="<?= base_url('barangkeluar/simpan') ?>" autocomplete="off" method="post">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="nama_barang" class="col-sm-2 col-form-label">Kode Transaksi</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="kd_transaksi" placeholder="" value="<?= $kd_transaksi ?>" readonly required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">No Delivery Order</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="no_invoice" placeholder="keluaran No Invoice / Nota .." required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="nama_supplier" class="col-sm-2 col-form-label">Nama Supplier</label>
                            <div class="col-sm-6">
                                <select name="nama_supplier" class="select2 form-control" required>
                                    <option value="">- Pilih --</option>
                                    <?php foreach ($supplier as $row) : ?>
                                        <option value="<?= $row['nama_supplier']; ?>"><?= $row['nama_supplier']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control" name="tanggal" placeholder=".." required>
                            </div>
                        </div>


                       
                        <div class="form-group row">
                            <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="keterangan" placeholder="keluaran keterangan atau Boleh dikosongkan">
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