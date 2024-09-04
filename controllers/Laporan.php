<?php
defined('BASEPATH') or exit('No direct script access allowed');

require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata("logged") <> 1) {
            redirect(site_url('login'));
        }

        //load model
        $this->load->model('ModelLaporan', 'ml');
        $this->load->model('ModelBarangMasuk', 'mbm');
        $this->load->model('ModelBarangKeluar', 'mbk');
        $this->load->model('ModelBarang', 'mb');
        $this->load->model('ModelSupplier', 'ms');
    }

    public function barangmasuk()
    {
        $data = array(
            'title' => 'Laporan Barang Masuk',
            'active_menu_lp' => 'menu-open',
            'active_menu_lpr' => 'active',
            'active_menu_brngmsuk' => 'active',
            'lokasi' => $this->ml->getLokasi()
        );
        $this->load->view('layouts/header', $data);
        $this->load->view('laporan/v_laporanbarangmasuk', $data);
        $this->load->view('layouts/footer');
    }

    public function searchbarangmasuk()
    {
        $awal = $this->input->post('tanggal_awal');
        $akhir = $this->input->post('tanggal_akhir');
        $tanggal_awal = date('Y-m-d', strtotime($awal));
        $tanggal_akhir = date('Y-m-d', strtotime($akhir));

        $data = array(
            'title' => 'Laporan Data Aset',
            'active_menu_lp' => 'menu-open',
            'active_menu_lpr' => 'active',
            'active_menu_lprn_brngmsuk' => 'active',
            'barangmasuk' => $this->ml->getbarangmasuk($tanggal_awal, $tanggal_akhir),
            'tgl_awal' => ($awal),
            'tgl_akhir' => ($akhir),
        );

        if (empty($data['barangmasuk'])) {
            $this->session->set_flashdata('gagal', 'Ditemukan');
            redirect('laporan/barangmasuk');
        } else {
            $this->load->view('layouts/header', $data);
            $this->load->view('laporan/r_barangmasuk', $data);
            $this->load->view('layouts/footer');
        }
    }
    public function printbarangmasuk($tgl_awal, $tgl_akhir)
    {

        $tgl_awal = $this->uri->segment(3);
        $tgl_akhir = $this->uri->segment(4);
        $tanggal_aawal = date('Y-m-d', strtotime($tgl_awal));
        $tanggal_aakhir = date('Y-m-d', strtotime($tgl_akhir));

        $data = array(
            'barangmasuk' => $this->ml->getbarangmasuk($tanggal_aawal, $tanggal_aakhir),
            'tgl_awal' => ($tgl_awal),
            'tgl_akhir' => ($tgl_akhir),
            // $data['lokasi'] = $this->ml->getLokasiId($id_lokasi);
        );
        if (count($data['barangmasuk']) > 0) {
            $this->load->view('laporan/p_barangmasuk', $data);
        } else {
            $this->session->set_flashdata('gagal', 'Ditemukan');
            redirect('laporan/barangmasuk');
        }
    }

    public function exportbarangmasuk($tgl_awal, $tanggal_akhir)
    {
        $tgl_awal = $this->uri->segment(3);
        $tgl_akhir = $this->uri->segment(4);
        $tanggal_aawal = date('Y-m-d', strtotime($tgl_awal));
        $tanggal_aakhir = date('Y-m-d', strtotime($tgl_akhir));


        $barangmasuk = $this->ml->getbarangmasuk($tanggal_aawal, $tanggal_aakhir);

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Kd Transaksi')
            ->setCellValue('C1', 'No Invoice')
            ->setCellValue('D1', 'Nama Supllaier')
            ->setCellValue('E1', 'Tanggal')
            ->setCellValue('F1', 'Kd Barang')
            ->setCellValue('G1', 'Nma Barang')
            ->setCellValue('H1', 'Stuan')
            ->setCellValue('I1', 'Ktgori')
            ->setCellValue('J1', 'Jumlh');

        $kolom = 2;
        $nomor = 1;

        foreach ($barangmasuk as $item) {

            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $item['kd_transaksi'])
                ->setCellValue('C' . $kolom, $item['no_invoice'])
                ->setCellValue('D' . $kolom, $item['nama_supplier'])
                ->setCellValue('E' . $kolom, $item['tanggal'])
                //->setCellValue('F' . $kolom, $item['kd_barang'])//
                ->setCellValue('G' . $kolom, $item['nama_barang'])
                ->setCellValue('H' . $kolom, $item['nama_satuan'])
                ->setCellValue('I' . $kolom, $item['nama_kategori'])
                ->setCellValue('J' . $kolom, $item['jumlah']);

            $kolom++;
            $nomor++;
        }
        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Data Laporan Barang Masuk' . $tanggal_aawal . '/' . $tanggal_aakhir . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function barangkeluar()
    {
        $data = array(
            'title' => 'Laporan Barang Masuk',
            'active_menu_lp' => 'menu-open',
            'active_menu_lpr' => 'active',
            'active_menu_brgkeluar' => 'active',
            'lokasi' => $this->ml->getLokasi()
        );
        $this->load->view('layouts/header', $data);
        $this->load->view('laporan/v_laporanbarangkeluar', $data);
        $this->load->view('layouts/footer');
    }

    public function searchbarangkeluar()
    {
        $awal = $this->input->post('tanggal_awal');
        $akhir = $this->input->post('tanggal_akhir');
        $tanggal_awal = date('Y-m-d', strtotime($awal));
        $tanggal_akhir = date('Y-m-d', strtotime($akhir));

        $data = array(
            'title' => 'Laporan Data Aset',
            'active_menu_lp' => 'menu-open',
            'active_menu_lpr' => 'active',
            'active_menu_lprn_brgkeluar' => 'active',
            'barangkeluar' => $this->ml->getbarangkeluar($tanggal_awal, $tanggal_akhir),
            'tgl_awal' => ($awal),
            'tgl_akhir' => ($akhir),
        );

        if (empty($data['barangkeluar'])) {
            $this->session->set_flashdata('gagal', 'Ditemukan');
            redirect('laporan/barangkeluar');
        } else {
            $this->load->view('layouts/header', $data);
            $this->load->view('laporan/r_barangkeluar', $data);
            $this->load->view('layouts/footer');
        }
    }
    public function printbarangkeluar($tgl_awal, $tgl_akhir)
    {

        $tgl_awal = $this->uri->segment(3);
        $tgl_akhir = $this->uri->segment(4);
        $tanggal_aawal = date('Y-m-d', strtotime($tgl_awal));
        $tanggal_aakhir = date('Y-m-d', strtotime($tgl_akhir));

        $data = array(
            'barangkeluar' => $this->ml->getbarangkeluar($tanggal_aawal, $tanggal_aakhir),
            'tgl_awal' => ($tgl_awal),
            'tgl_akhir' => ($tgl_akhir),
            // $data['lokasi'] = $this->ml->getLokasiId($id_lokasi);
        );
        if (count($data['barangkeluar']) > 0) {
            $this->load->view('laporan/p_barangkeluar', $data);
        } else {
            $this->session->set_flashdata('gagal', 'Ditemukan');
            redirect('laporan/barangkeluar');
        }
    }

    public function exportbarangkeluar($tgl_awal, $tanggal_akhir)
    {
        $tgl_awal = $this->uri->segment(3);
        $tgl_akhir = $this->uri->segment(4);
        $tanggal_aawal = date('Y-m-d', strtotime($tgl_awal));
        $tanggal_aakhir = date('Y-m-d', strtotime($tgl_akhir));


        $barangkeluar = $this->ml->getbarangkeluar($tanggal_aawal, $tanggal_aakhir);

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Kd Transaksi')
            ->setCellValue('C1', 'No Invoice')
            ->setCellValue('D1', 'Nama Supllaier')
            ->setCellValue('E1', 'Tanggal')
            ->setCellValue('F1', 'Kd Barang')
            ->setCellValue('G1', 'Nma Barang')
            ->setCellValue('H1', 'Stuan')
            ->setCellValue('I1', 'Ktgori')
            ->setCellValue('J1', 'Jumlh');

        $kolom = 2;
        $nomor = 1;

        foreach ($barangkeluar as $item) {

            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $item['kd_transaksi'])
                ->setCellValue('C' . $kolom, $item['no_invoice'])
                ->setCellValue('D' . $kolom, $item['nama_supplier'])
                ->setCellValue('E' . $kolom, $item['tanggal'])
                //->setCellValue('F' . $kolom, $item['kd_barang'])//
                ->setCellValue('G' . $kolom, $item['nama_barang'])
                ->setCellValue('H' . $kolom, $item['nama_satuan'])
                ->setCellValue('I' . $kolom, $item['nama_kategori'])
                ->setCellValue('J' . $kolom, $item['jumlah']);

            $kolom++;
            $nomor++;
        }
        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Data Laporan Barang Masuk' . $tanggal_aawal . '/' . $tanggal_aakhir . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    public function stokbarang()
    {
        $data = array(
            'title' => 'Laporan Barang Masuk',
            'active_menu_lp' => 'menu-open',
            'active_menu_lpr' => 'active',
            'active_menu_stokbarang' => 'active',
            'lokasi' => $this->ml->getLokasi()
        );
        $this->load->view('layouts/header', $data);
        $this->load->view('laporan/v_laporanstokbarang', $data);
        $this->load->view('layouts/footer');
    }

    public function searchstokbarang()
    {
        $awal = $this->input->post('tanggal_awal');
        $akhir = $this->input->post('tanggal_akhir');
        $tanggal_awal = date('Y-m-d', strtotime($awal));
        $tanggal_akhir = date('Y-m-d', strtotime($akhir));

        $data = array(
            'title' => 'Laporan Data Aset',
            'active_menu_lp' => 'menu-open',
            'active_menu_lpr' => 'active',
            'active_menu_lprn_stokbarang' => 'active',
            'stokbarang' => $this->ml->getstokbarang($tanggal_awal, $tanggal_akhir),
            'tgl_awal' => ($awal),
            'tgl_akhir' => ($akhir),
        );

        if (empty($data['stokbarang'])) {
            $this->session->set_flashdata('gagal', 'Ditemukan');
            redirect('laporan/stokbarang');
        } else {
            $this->load->view('layouts/header', $data);
            $this->load->view('laporan/r_stokbarang', $data);
            $this->load->view('layouts/footer');
        }
    }
    public function printstokbarang($tgl_awal, $tgl_akhir)
    {

        $tgl_awal = $this->uri->segment(3);
        $tgl_akhir = $this->uri->segment(4);
        $tanggal_aawal = date('Y-m-d', strtotime($tgl_awal));
        $tanggal_aakhir = date('Y-m-d', strtotime($tgl_akhir));

        $data = array(
            'stokbarang' => $this->ml->getstokbarang($tanggal_aawal, $tanggal_aakhir),
            'tgl_awal' => ($tgl_awal),
            'tgl_akhir' => ($tgl_akhir),
            // $data['lokasi'] = $this->ml->getLokasiId($id_lokasi);
        );
        if (count($data['stokbarang']) > 0) {
            $this->load->view('laporan/p_stokbarang', $data);
        } else {
            $this->session->set_flashdata('gagal', 'Ditemukan');
            redirect('laporan/stokbarang');
        }
    }

    public function exportstokbarang($tgl_awal, $tanggal_akhir)
    {
        $tgl_awal = $this->uri->segment(3);
        $tgl_akhir = $this->uri->segment(4);
        $tanggal_aawal = date('Y-m-d', strtotime($tgl_awal));
        $tanggal_aakhir = date('Y-m-d', strtotime($tgl_akhir));


        $stokbarang = $this->ml->getstokbarang($tanggal_aawal, $tanggal_aakhir);

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Kd Transaksi')
            ->setCellValue('C1', 'No Invoice')
            ->setCellValue('D1', 'Nama Supllaier')
            ->setCellValue('E1', 'Tanggal')
            ->setCellValue('F1', 'Kd Barang')
            ->setCellValue('G1', 'Nma Barang')
            ->setCellValue('H1', 'Stuan')
            ->setCellValue('I1', 'Ktgori')
            ->setCellValue('J1', 'Jumlh');

        $kolom = 2;
        $nomor = 1;

        foreach ($stokbarang as $item) {

            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $item['kd_transaksi'])
                ->setCellValue('C' . $kolom, $item['no_invoice'])
                ->setCellValue('D' . $kolom, $item['nama_supplier'])
                ->setCellValue('E' . $kolom, $item['tanggal'])
                //->setCellValue('F' . $kolom, $item['kd_barang'])//
                ->setCellValue('G' . $kolom, $item['nama_barang'])
                ->setCellValue('H' . $kolom, $item['nama_satuan'])
                ->setCellValue('I' . $kolom, $item['nama_kategori'])
                ->setCellValue('J' . $kolom, $item['jumlah']);

            $kolom++;
            $nomor++;
        }
        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Data Laporan Barang Masuk' . $tanggal_aawal . '/' . $tanggal_aakhir . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function searchAset()
    {
        $id_lokasi = $this->input->post('id_lokasi');
        $tahun_perolehan = $this->input->post('tahun_perolehan');

        $data = array(
            'title' => 'Laporan Data Aset',
            'active_menu_lp' => 'menu-open',
            'active_menu_lpr' => 'active',
            'active_menu_ast' => 'active',
            'lokasi' => $this->ml->getLokasi(),
            'lok' => $this->ml->getLokasiId($id_lokasi),
            'aset' => $this->ml->getAsetWujud($id_lokasi, $tahun_perolehan)
        );

        if (count($data['aset']) > 0) {
            $this->load->view('layouts/header', $data);
            $this->load->view('laporan/r_aset', $data);
            $this->load->view('layouts/footer');
        } else {
            $this->session->set_flashdata('gagal', 'Ditemukan');
            redirect('laporan/aset');
        }
    }

    public function printAset($id_lokasi, $tahun_perolehan)
    {
        $id_lokasi = $this->uri->segment(3);
        $tahun_perolehan = $this->uri->segment(4);

        $data['aset'] = $this->ml->getAsetWujud($id_lokasi, $tahun_perolehan);
        $data['lokasi'] = $this->ml->getLokasiId($id_lokasi);

        if (count($data['aset']) > 0) {
            $this->load->view('laporan/p_aset', $data);
        } else {
            $this->session->set_flashdata('gagal', 'Ditemukan');
            redirect('laporan/aset');
        }
    }

    public function export_aset($id_lokasi, $tahun_perolehan)
    {
        $id_lokasi = $this->uri->segment(3);
        $tahun_perolehan = $this->uri->segment(4);

        $aset = $this->ml->getAsetWujudExcel($id_lokasi, $tahun_perolehan);

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'NO')
            ->setCellValue('B1', 'NAMA')
            ->setCellValue('C1', 'VOLUME')
            ->setCellValue('D1', 'SATUAN')
            ->setCellValue('E1', 'HARGA (Rp.)')
            ->setCellValue('F1', 'JUMLAH (Rp.)');

        $kolom = 2;
        $nomor = 1;
        foreach ($aset as $item) {

            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $item->nama_barang)
                ->setCellValue('C' . $kolom, $item->volume)
                ->setCellValue('D' . $kolom, $item->satuan)
                ->setCellValue('E' . $kolom, $item->harga)
                ->setCellValue('F' . $kolom, $item->total_harga);

            $kolom++;
            $nomor++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Data Aset.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function penghapusan()
    {
        $data = array(
            'title' => 'Laporan Aset',
            'active_menu_lp' => 'menu-open',
            'active_menu_lpr' => 'active',
            'active_menu_php' => 'active',
            'lokasi' => $this->ml->getLokasi()
        );
        $this->load->view('layouts/header', $data);
        $this->load->view('laporan/v_laporan_ph', $data);
        $this->load->view('layouts/footer');
    }

    public function searchPenghapusan()
    {
        $id_lokasi = $this->input->post('id_lokasi');
        $tahun_perolehan = $this->input->post('tahun_perolehan');

        $data = array(
            'title' => 'Laporan Data Aset',
            'active_menu_lp' => 'menu-open',
            'active_menu_lpr' => 'active',
            'active_menu_php' => 'active',
            'lokasi' => $this->ml->getLokasi(),
            'lok' => $this->ml->getLokasiId($id_lokasi),
            'aset' => $this->ml->getAsetDihapuskan($id_lokasi, $tahun_perolehan)
        );

        if (count($data['aset']) > 0) {
            $this->load->view('layouts/header', $data);
            $this->load->view('laporan/r_penghapusan', $data);
            $this->load->view('layouts/footer');
        } else {
            $this->session->set_flashdata('gagal', 'Ditemukan');
            redirect('laporan/aset');
        }
    }

    public function printPenghapusan($id_lokasi, $tahun_perolehan)
    {
        $id_lokasi = $this->uri->segment(3);
        $tahun_perolehan = $this->uri->segment(4);

        $data['aset'] = $this->ml->getAsetDihapuskan($id_lokasi, $tahun_perolehan);
        $data['lokasi'] = $this->ml->getLokasiId($id_lokasi);

        if (count($data['aset']) > 0) {
            $this->load->view('laporan/p_penghapusan', $data);
        } else {
            $this->session->set_flashdata('gagal', 'Ditemukan');
            redirect('laporan/aset');
        }
    }

    public function export_penghapusan($id_lokasi, $tahun_perolehan)
    {
        $id_lokasi = $this->uri->segment(3);
        $tahun_perolehan = $this->uri->segment(4);

        $aset = $this->ml->getAsetDihapuskanExcel($id_lokasi, $tahun_perolehan);

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'NO')
            ->setCellValue('B1', 'NAMA')
            ->setCellValue('C1', 'VOLUME')
            ->setCellValue('D1', 'SATUAN')
            ->setCellValue('E1', 'HARGA (Rp.)')
            ->setCellValue('F1', 'JUMLAH (Rp.)');

        $kolom = 2;
        $nomor = 1;
        foreach ($aset as $item) {

            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $item->nama_barang)
                ->setCellValue('C' . $kolom, $item->volume)
                ->setCellValue('D' . $kolom, $item->satuan)
                ->setCellValue('E' . $kolom, $item->harga)
                ->setCellValue('F' . $kolom, $item->total_harga);

            $kolom++;
            $nomor++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Data Aset Dihapuskan.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function qrcodeAset()
    {
        $data = array(
            'title' => 'Laporan Aset',
            'active_menu_lp' => 'menu-open',
            'active_menu_lpr' => 'active',
            'active_menu_qr' => 'active',
            'lokasi' => $this->ml->getLokasi()
        );
        $this->load->view('layouts/header', $data);
        $this->load->view('laporan/v_qrcode', $data);
        $this->load->view('layouts/footer');
    }

    public function printQrcode()
    {
        $id_lokasi = $this->input->post('id_lokasi');
        $tahun_perolehan = $this->input->post('tahun_perolehan');

        $data['aset'] = $this->ml->getAsetQr($id_lokasi, $tahun_perolehan);
        $data['lokasi'] = $this->ml->getLokasiId($id_lokasi);

        if (count($data['aset']) > 0) {
            $this->load->view('laporan/p_qrcode', $data);
        } else {
            $this->session->set_flashdata('gagal', 'Ditemukan');
            redirect('laporan/aset');
        }
    }

    public function pengadaan()
    {
        $data = array(
            'title' => 'Laporan Aset',
            'active_menu_lp' => 'menu-open',
            'active_menu_lpr' => 'active',
            'active_menu_lpnd' => 'active',
            'lokasi' => $this->ml->getLokasi()
        );
        $this->load->view('layouts/header', $data);
        $this->load->view('laporan/v_pengadaan', $data);
        $this->load->view('layouts/footer');
    }

    public function searchPengadaan()
    {
        $id_lokasi = $this->input->post('id_lokasi');
        $tahun_pengadaan = $this->input->post('tahun_pengadaan');

        $data = array(
            'title' => 'Laporan Pengadaan',
            'active_menu_lp' => 'menu-open',
            'active_menu_lpr' => 'active',
            'active_menu_lpnd' => 'active',
            'lokasi' => $this->ml->getLokasi(),
            'lok' => $this->ml->getLokasiId($id_lokasi),
            'pnd' => $this->ml->getPengadaan($id_lokasi, $tahun_pengadaan)
        );

        if (count($data['pnd']) > 0) {
            $this->load->view('layouts/header', $data);
            $this->load->view('laporan/r_pengadaan', $data);
            $this->load->view('layouts/footer');
        } else {
            $this->session->set_flashdata('gagal', 'Ditemukan');
            redirect('laporan/pengadaan');
        }
    }

    public function printPengadaan($id_lokasi, $tahun_pengadaan)
    {
        $id_lokasi = $this->uri->segment(3);
        $tahun_pengadaan = $this->uri->segment(4);

        $data['pnd'] = $this->ml->getPengadaan($id_lokasi, $tahun_pengadaan);
        $data['lokasi'] = $this->ml->getLokasiId($id_lokasi);

        $this->load->view('laporan/p_pengadaan', $data);
    }

    public function export_pengadaan($id_lokasi, $tahun_pengadaan)
    {
        $id_lokasi = $this->uri->segment(3);
        $tahun_pengadaan = $this->uri->segment(4);

        $pnd = $this->ml->getPengadaanExcel($id_lokasi, $tahun_pengadaan);

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'NO')
            ->setCellValue('B1', 'NAMA')
            ->setCellValue('C1', 'VOLUME')
            ->setCellValue('D1', 'SATUAN')
            ->setCellValue('E1', 'HARGA (Rp.)')
            ->setCellValue('F1', 'JUMLAH (Rp.)');

        $kolom = 2;
        $nomor = 1;
        foreach ($pnd as $item) {

            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $item->nama_aset)
                ->setCellValue('C' . $kolom, $item->volume)
                ->setCellValue('D' . $kolom, $item->satuan)
                ->setCellValue('E' . $kolom, $item->harga_satuan)
                ->setCellValue('F' . $kolom, ($item->volume * $item->harga_satuan));

            $kolom++;
            $nomor++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Pengadaan Aset.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}

/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */