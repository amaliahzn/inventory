<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'Login/index';
$route['404_override'] = 'Welcome/halaman_notFound';
$route['translate_uri_dashes'] = FALSE;

//Auth
$route['login'] = 'Login/index';
$route['proses_login'] = 'Login/proses_login';
$route['logout'] = 'Login/proses_logout';

//Front
$route['aset/detail/(:any)'] = 'Welcome/detailAset/(:any)';

//Dashboard
$route['home'] = 'Home/index';

//Statistik
$route['statistik'] = 'Statistik/index';

//Master Barang
$route['barang'] = 'Barang/index';
$route['barang/tambah'] = 'Barang/tambahBarang';
$route['barang/simpan'] = 'Barang/simpanBarang';
$route['barang/edit/(:any)'] = 'Barang/editBarang/(:any)';
$route['barang/ubah'] = 'Barang/ubahBarang';
$route['barang/hapus/(:any)'] = 'Barang/hapusBarang/(:any)';

//satuan
$route['satuan'] = 'satuan/index';
$route['satuan/simpan'] = 'satuan/store';
$route['satuan/ubah'] = 'satuan/ubah';
$route['satuan/hapus/(:any)'] = 'satuan/hapus/(:any)';

//Kategori Barang
$route['kategori'] = 'KategoriBarang/index';
$route['kategori/simpan'] = 'KategoriBarang/store';
$route['kategori/ubah'] = 'KategoriBarang/ubah';
$route['kategori/hapus/(:any)'] = 'KategoriBarang/hapus/(:any)';

//Data Supplier
$route['supplier'] = 'supplier/index';
$route['supplier/simpan'] = 'supplier/StoreSupplier';
$route['supplier/ubah'] = 'supplier/updateSupplier';
$route['supplier/hapus/(:any)'] = 'supplier/deleteSupplier/(:any)';

//LokasiAset
$route['lokasi'] = 'LokasiAset/index';
$route['lokasi/simpan'] = 'LokasiAset/simpanLokasi';
$route['lokasi/ubah'] = 'LokasiAset/ubahLokasi';
$route['lokasi/hapus/(:any)'] = 'LokasiAset/hapusLokasi/(:any)';

//User
$route['users'] = 'User/users';
$route['users/tambah'] = 'User/tambahUser';
$route['users/hapus/(:any)'] = 'User/hapusUser/(:any)';
$route['pengaturan'] = 'User/pengaturan';
$route['users/ubah'] = 'User/updateUser';
$route['users/ubah_password'] = 'User/updatePassword';

// barang masuk
$route['barangmasuk'] = 'Barangmasuk/index';
$route['barangmasuk/tambah'] = 'Barangmasuk/tambahBarangmasuk';
$route['barangmasuk/simpan'] = 'Barangmasuk/simpanBarangmasuk';
$route['barangmasuk/edit/(:any)'] = 'Barangmasuk/editBarangmasuk/(:any)';
$route['barangmasuk/ubah'] = 'Barangmasuk/ubahBarangmasuk';
$route['barangmasuk/hapus/(:any)'] = 'Barangmasuk/hapusBarangmasuk/(:any)';

// barang masuk Detail
$route['barangmasuk/detail/(:any)'] = 'Barangmasuk/detailBarangmasuk/(:any)';
$route['barangmasuk/detailubah'] = 'Barangmasuk/detailubahBarangmasuk';
$route['barangmasuk/simpandetail'] = 'Barangmasuk/storebarangmasukdetail';
$route['barangmasuk/hapusdetail/(:any)'] = 'Barangmasuk/hapusBarangmasukDetail/(:any)';

// barang keluar
$route['barangkeluar'] = 'Barangkeluar/index';
$route['barangkeluar/tambah'] = 'Barangkeluar/tambahBarangkeluar';
$route['barangkeluar/simpan'] = 'Barangkeluar/simpanBarangkeluar';
$route['barangkeluar/edit/(:any)'] = 'Barangkeluar/editBarangkeluar/(:any)';
$route['barangkeluar/ubah'] = 'Barangkeluar/ubahBarangkeluar';
$route['barangkeluar/hapus/(:any)'] = 'Barangkeluar/hapusBarangkeluar/(:any)';

// barang keluar Detail
$route['barangkeluar/detail/(:any)'] = 'Barangkeluar/detailBarangkeluar/(:any)';
$route['barangkeluar/detailubah'] = 'Barangkeluar/detailubahBarangkeluar';
$route['barangkeluar/simpandetail'] = 'Barangkeluar/storebarangkeluardetail';
$route['barangkeluar/hapusdetail/(:any)'] = 'Barangkeluar/hapusBarangkeluarDetail/(:any)';

// peminjaman
$route['peminjaman'] = 'peminjaman/index';
$route['peminjaman/tambah'] = 'peminjaman/tambahpeminjaman';
$route['peminjaman/simpan'] = 'peminjaman/simpanpeminjaman';
$route['peminjaman/edit/(:any)'] = 'peminjaman/editpeminjaman/(:any)';
$route['peminjaman/ubah'] = 'peminjaman/ubahpeminjaman';
$route['peminjaman/hapus/(:any)'] = 'peminjaman/hapuspeminjaman/(:any)';

// peminjaman detail
$route['peminjaman/detail/(:any)'] = 'peminjaman/detailpeminjaman/(:any)';
$route['peminjaman/detailubah'] = 'peminjaman/detailubahpeminjaman';
$route['peminjaman/simpandetail'] = 'peminjaman/storepeminjamandetail';
$route['peminjaman/hapusdetail/(:any)'] = 'peminjaman/hapuspeminjamanDetail/(:any)';

// pengadaan
$route['pengadaan'] = 'pengadaan/index';
$route['pengadaan/tambah'] = 'pengadaan/tambahpengadaan';
$route['pengadaan/simpan'] = 'pengadaan/simpanpengadaan';
$route['pengadaan/edit/(:any)'] = 'pengadaan/editpengadaan/(:any)';
$route['pengadaan/ubah'] = 'pengadaan/ubahpengadaan';
$route['pengadaan/hapus/(:any)'] = 'pengadaan/hapuspengadaan/(:any)';

// pengadaan detail
$route['pengadaan/detail/(:any)'] = 'pengadaan/detailpengadaan/(:any)';
$route['pengadaan/detailubah'] = 'pengadaan/detailubahpengadaan';
$route['pengadaan/simpandetail'] = 'pengadaan/storepengadaandetail';
$route['pengadaan/hapusdetail/(:any)'] = 'pengadaan/hapuspengadaanDetail/(:any)';


// Amprah Barang
$route['amprahbarang'] = 'Amprahbarang/index';
$route['amprahbarang/daftaramprah'] = 'Amprahbarang/DaftarAmprah';
$route['amprahbarang/detail/(:any)/(:any)'] = 'Amprahbarang/DetailDaftarAmprahBarang/(:any)/(:any)';
$route['amprahbarang/tambah'] = 'Amprahbarang/tambahamprahbarang';
$route['amprahbarang/simpan'] = 'Amprahbarang/simpanAmprahBarangHeader';
$route['amprahbarang/tambahdetail/(:any)'] = 'Amprahbarang/TambahDetailAmprahBarang/(:any)';
$route['amprahbarang/daftaramprahbelumacc'] = 'Amprahbarang/DaftaramprahBelumacc';
$route['amprahbarang/printdaftaramprahbarang/(:any)/(:any)'] = 'Amprahbarang/printAmprahBarang/(:any)/(:any)';
$route['amprahbarang/detailbelumacc/(:any)/(:any)'] = 'Amprahbarang/DetailDaftarAmprahBarangbelumacc/(:any)/(:any)';

$route['amprahbarang/simpandetail'] = 'Amprahbarang/storeDetailAmprahBarang';
$route['amprahbarang/hapusdetail/(:any)'] = 'amprahbarang/hapusAmprahBarangDetail/(:any)';
$route['amprahbarang/edit/(:any)'] = 'Amprahbarang/editamprahbarang/(:any)';
$route['amprahbarang/ubah'] = 'Amprahbarang/ubahamprahbarang';
$route['amprahbarang/hapus/(:any)'] = 'Amprahbarang/hapusamprahbarang/(:any)';

// permintaan barang
$route['permintaanbarang'] = 'PermintaanBarang/index';
$route['permintaanbarang/detail/(:any)/(:any)'] = 'PermintaanBarang/DetailPermintaan/(:any)/(:any)';
$route['permintaanbarang/setujui/(:any)'] = 'PermintaanBarang/setujuiPermintaan/(:any)';
$route['permintaanbarang/setujuikabag/(:any)'] = 'PermintaanBarang/setujuikabagPermintaan/(:any)';
$route['permintaanbarang/tolak/(:any)'] = 'PermintaanBarang/tolakPermintaan/(:any)';
$route['permintaanbarang/tolakkabag/(:any)'] = 'PermintaanBarang/tolakkabagPermintaan/(:any)';
$route['permintaanbarang/ubah'] = 'PermintaanBarang/updatePermintaanBarang';
$route['permintaanbarang/datapermintaanbarang'] = 'PermintaanBarang/datapermintaanbarang';

$route['permintaanbarang/tambah'] = 'PermintaanBarang/tambahPermintaanBarang';
$route['permintaanbarang/hapus/(:any)'] = 'PermintaanBarang/hapusPermintaanBarang/(:any)';

// Pengajuan barang
$route['pengajuan'] = 'Pengajuan/index';
$route['pengajuan/detail/(:any)/(:any)'] = 'Pengajuan/DetailPermintaan/(:any)/(:any)';
$route['pengajuan/setujui/(:any)'] = 'Pengajuan/setujuiPermintaan/(:any)';
$route['pengajuan/tolak/(:any)'] = 'Pengajuan/tolakPermintaan/(:any)';
$route['pengajuan/ubah'] = 'Pengajuan/updatepengajuan';
$route['pengajuan/datapengajuan'] = 'Pengajuan/datapengajuan';

//Aset
$route['aset_wujud'] = 'Aset/index';
$route['aset_wujud/tambah'] = 'Aset/tambahAset';
$route['aset_wujud/cari'] = 'Aset/cariAset';
$route['aset_wujud/simpan'] = 'Aset/simpanAset';
$route['aset_wujud/edit/(:any)'] = 'Aset/editAset/(:any)';
$route['aset_wujud/ubah'] = 'Aset/ubahAset';
$route['aset_wujud/detail/(:any)'] = 'Aset/detailAset/(:any)';
$route['aset_wujud/hapus/(:any)'] = 'Aset/hapusAset/(:any)';
$route['aset_wujud/filter'] = 'Aset/filterAset';
//Dihapuskan
$route['aset_dihapuskan'] = 'Aset/dihapuskanAset';
$route['aset_dihapuskan/detail/(:any)'] = 'Aset/detailDihapuskanAset/(:any)';
$route['aset_dihapuskan/filter'] = 'Aset/filterAsetDihapuskan';

//Keputusan Pengadaan
$route['kriteria'] = 'Pengadaan/index';
$route['spesifikasi/ubah'] = 'Pengadaan/ubahSpesifikasi';
$route['kualitas/ubah'] = 'Pengadaan/ubahKualitas';
$route['data_aset'] = 'Pengadaan/aset';
$route['data_aset/simpan'] = 'Pengadaan/simpanAset';
$route['data_aset/ubah'] = 'Pengadaan/ubahAset';
$route['data_aset/hapus/(:any)'] = 'Pengadaan/hapusAset/(:any)';
$route['penilaian/simpan'] = 'Pengadaan/simpanPenilaian';
$route['penilaian/ubah'] = 'Pengadaan/ubahPenilaian';
$route['penilaian/hapus/(:any)'] = 'Pengadaan/hapusPenilaian/(:any)';
//spk
$route['spk'] = 'Pengadaan/spk';
$route['test'] = 'Pengadaan/testpk';

//Pengadaan
$route['pengajuan'] = 'Pengadaan/pengajuan';
// $route['pengadaan'] = 'Pengadaan/pengadaan';
// $route['pengadaan/simpan'] = 'Pengadaan/simpanPengadaan';
// $route['pengadaan/detail/(:any)'] = 'Pengadaan/detailPengadaan/(:any)';
// $route['pengadaan/setujui/(:any)'] = 'Pengadaan/setujuiPengadaan/(:any)';
// $route['pengadaan/tolak/(:any)'] = 'Pengadaan/tolakPengadaan/(:any)';
// $route['pengadaan/hapus/(:any)'] = 'Pengadaan/hapusPengadaan/(:any)';
// $route['pengadaan/filter'] = 'Pengadaan/filterPengadaan';

//Monitoring
$route['monitoring'] = 'Monitoring/index';
$route['monitoring/tambah'] = 'Monitoring/tambahMonitoring';
$route['monitoring/simpan'] = 'Monitoring/simpanMonitoring';
$route['monitoring/detail/(:any)'] = 'Monitoring/detailMonitoring/(:any)';
$route['monitoring/edit/(:any)'] = 'Monitoring/editMonitoring/(:any)';
$route['monitoring/ubah'] = 'Monitoring/ubahMonitoring';
$route['monitoring/hapus/(:any)'] = 'Monitoring/hapusMonitoring/(:any)';

//Penyusutan
$route['penyusutan'] = 'Penyusutan/index';
$route['penyusutan/detail/(:any)'] = 'Penyusutan/detailPenyusutan/(:any)';
$route['penyusutan/hapuskan/(:any)'] = 'Penyusutan/penghapusanAset/(:any)';
$route['penyusutan/filter'] = 'Penyusutan/filterPenyusutan';

//Penghapusan
$route['penghapusan'] = 'Penghapusan/index';
$route['penghapusan/simpan'] = 'Penghapusan/simpanPenghapusan';

//Laporan
// Laporan barangmasuk
$route['laporan/barangmasuk'] = 'Laporan/barangmasuk';
$route['laporan/search_barangmasuk'] = 'Laporan/searchbarangmasuk';
$route['laporan/print_barangmasuk/(:any)'] = 'Laporan/printbarangmasuk/(:any)';
$route['laporan/exportbarangmasuk/(:any)/(:any)'] = 'Laporan/exportbarangmasuk/(:any)/(:any)';

// Laporan barangmasuk
$route['laporan/barangkeluar'] = 'Laporan/barangkeluar';
$route['laporan/search_barangkeluar'] = 'Laporan/searchbarangkeluar';
$route['laporan/print_barangkeluar/(:any)'] = 'Laporan/printbarangkeluar/(:any)';
$route['laporan/exportbarangkeluar/(:any)/(:any)'] = 'Laporan/exportbarangkeluar/(:any)/(:any)';

// Laporan stokbarang
$route['laporan/stokbarang'] = 'Laporan/stokbarang';
$route['laporan/search_stokbarang'] = 'Laporan/searchstokbarang';
$route['laporan/print_stokbarang/(:any)'] = 'Laporan/printstokbarang/(:any)';
$route['laporan/exportstokbarang/(:any)/(:any)'] = 'Laporan/exportstokbarang/(:any)/(:any)';

//Laporan Data Aset
$route['laporan/aset'] = 'Laporan/aset';
$route['laporan/search_aset'] = 'Laporan/searchAset';
$route['laporan/print_aset/(:any)/(:any)'] = 'Laporan/printAset/(:any)/(:any)';
$route['laporan/export_aset/(:any)/(:any)'] = 'Laporan/export_aset/(:any)/(:any)';
//Laporan Penghapusan
$route['laporan/penghapusan'] = 'Laporan/penghapusan';
$route['laporan/search_penghapusan'] = 'Laporan/searchPenghapusan';
$route['laporan/print_penghapusan/(:any)/(:any)'] = 'Laporan/printPenghapusan/(:any)/(:any)';
$route['laporan/export_penghapusan/(:any)/(:any)'] = 'Laporan/export_penghapusan/(:any)/(:any)';
//Laporan QR Code
$route['laporan/qr_code'] = 'Laporan/qrcodeAset';
$route['laporan/print_qrcode'] = 'Laporan/printQrcode';
//Laporan Pengadaan
$route['laporan/pengadaan'] = 'Laporan/pengadaan';
$route['laporan/search_pengadaan'] = 'Laporan/searchPengadaan';
$route['laporan/print_pengadaan/(:any)/(:any)'] = 'Laporan/printPengadaan/(:any)/(:any)';
$route['laporan/export_pengadaan/(:any)/(:any)'] = 'Laporan/export_pengadaan/(:any)/(:any)';


//Settingan 
$route['(:any)'] = 'errors/show_404';
$route['(:any)/(:any)'] = 'errors/show_404';
$route['(:any)/(:any)/(:any)'] = 'errors/show_404';
