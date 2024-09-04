<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Laporan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Laporan</a></li>
                        <li class="breadcrumb-item active">Data Barang Masuk</li>
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
                <h3 class="card-title">
                    Cari Laporan Data Masuk
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
                <form action="<?= base_url('laporan/search_barangmasuk') ?>" method="post">
                    <div class="row">
                        <div class="col-4">
                            <input type="date" name="tanggal_awal" value="<?= $tgl_awal ?>" class="form-control">
                        </div>
                        <div class="col-4">
                            <input type="date" name="tanggal_akhir" value="<?= $tgl_akhir ?>" class="form-control">
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-block btn-outline-primary">Cari</button>
                        </div>
                        <div class="col">
                            <button type="reset" value="reset" class="btn btn-block btn-outline-danger">Reset</button>
                        </div>
                    </div>
                </form>
                <a href="<?= base_url('laporan/printbarangmasuk/') . $tgl_awal . '/' . $tgl_akhir ?>" target="_blank" class="btn btn-danger mt-4">
                    <i class="fa fa-print" aria-hidden="true"></i> Print
                </a>
                <a href="<?= base_url('laporan/exportbarangmasuk/') . $tgl_awal . '/' . $tgl_akhir ?>" class="btn btn-success mt-4">
                    <i class="fa fa-file" aria-hidden="true"></i> Export Excel
                </a>
                <table class="table table-bordered mt-4">
                    <thead>
                        <tr>
                        <th>No</th> 
                        <th>Kd Transaksi</th> 
              <th>No Delivery Order</th>
              <th>Nama Supllaier</th>
              <th>Tanggal Terima</th>
              <!-- <th>Kode Barang</th> -->
              <th>Nama Barang</th>
              <th>Kategori</th>
              <th>Jumlah</th>
              <th>Satuan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $sum = 0;
                        foreach ($barangmasuk as $row) :
                            // $sum += $row['total_harga'];
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['kd_transaksi'] ?>
                                </td>
                                <td>
                                    <?= $row['no_invoice']; ?>
                                </td>
                                <td>
                                    <?= $row['nama_supplier']; ?>
                                </td>
                                <td>
                                    <?= $row['tanggal']; ?>
                                </td>
                                <!-- <td>
                                    <?= $row['kd_barang']; ?>
                                </td> -->
                                <td>
                                    <?= $row['nama_barang']; ?>
                                </td>
                                <td>
                                    <?= $row['nama_kategori']; ?>
                                </td>
                                <td>
                                    <?= $row['jumlah']; ?>
                                </td>
                                <td>
                                    <?= $row['nama_satuan']; ?>
                                </td>

                            </tr>
                        <?php endforeach ?>

                    </tbody>
                </table>
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