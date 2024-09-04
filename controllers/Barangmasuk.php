<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barangmasuk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata("logged") <> 1) {
            redirect(site_url('login'));
        }

        //load model
        $this->load->model('ModelBarangMasuk', 'mbm');
        $this->load->model('ModelBarang', 'mb');
        $this->load->model('ModelSupplier', 'ms');
        $this->load->model('ModelKategori', 'mk');
        $this->load->model('ModelSatuan', 'mst');
    }

    //menampilkan data barang
    public function index()
    {

        $data = array(
            'title' => 'Data Barang Masuk',
            'active_menu_transaksi_masuk' => 'menu-open',
            'active_menu_trns_msuk' => 'active',
            'active_menu_barangmasuk' => 'active',
            'barangmasuk' => $this->mbm->getDatabarangmasuk(),
            'kd_transaksi' => $this->mbm->CreateCode()
        );

        $this->load->view('layouts/header', $data);
        $this->load->view('permintaan/v_barangmasuk', $data);
        $this->load->view('layouts/footer');
    }


    public function tambahBarangMasuk()
    {
        $data = array(
            'title' => 'Data Barang Masuk',
            'active_menu_transaksi_masuk' => 'menu-open',
            'active_menu_trns_msuk' => 'active',
            'active_menu_barangmasuk' => 'active',
            'kd_transaksi' => $this->mbm->CreateCode(),
            'barang' => $this->mb->getDataBarang(),
            'supplier' => $this->ms->getDataSupplier(),
        );

        $this->load->view('layouts/header', $data);
        $this->load->view('permintaan/c_barangmasuk', $data);
        $this->load->view('layouts/footer');
    }

    public function simpanBarangMasuk()
    {
        $data = $this->input->post(null, true);
        $result = $this->mbm->storeBarangMasuk($data);

        if ($result >= 1) {
            $this->session->set_flashdata('sukses', 'Disimpan');
            redirect('barangmasuk');
        } else {
            $this->session->set_flashdata('gagal', 'Disimpan');
            redirect('barangmasuk/tambah');
        }
    }

    public function editBarangMasuk($id_barangmasuk)
    {
        $id_barangmasuk = $this->uri->segment(3);

        $data = array(
            'title' => 'Data Barang Masuk',
            'active_menu_transaksi_masuk' => 'menu-open',
            'active_menu_trns_msuk' => 'active',
            'active_menu_barangmasuk' => 'active',
            'barangmasuk' => $this->mbm->getDataBarangMasukHeader($id_barangmasuk),
            'supplier' => $this->ms->getDataSupplier(),
        );

        $this->load->view('layouts/header', $data);
        $this->load->view('permintaan/u_barangmasuk', $data);
        $this->load->view('layouts/footer');
    }

    public function ubahBarangMasuk()
    {
        $id_barangmasuk = $this->input->post('id_barangmasuk');
        $data = $this->input->post(null, true);
        unset($data['id_barangmasuk']);
        $result = $this->mbm->updatebarangmasuk($id_barangmasuk, $data);
        if ($result >= 1) {
            $this->session->set_flashdata('sukses', 'Diubah');
            redirect('barangmasuk');
        } else {
            $this->session->set_flashdata('gagal', 'Diubah');
            redirect('barangmasuk/edit/' . $id_barangmasuk);
        }
    }

    public function hapusBarangMasuk($id_barangmasuk)
    {
        $id_barangmasuk = $this->uri->segment(3);
        $where = array('id_barangmasuk' => $id_barangmasuk);
        $res = $this->mbm->deletebarangmasuk($where);
        if ($res >= 1) {
            $this->session->set_flashdata('sukses', 'Dihapus');
            redirect('barangmasuk');
        } else {
            $this->session->set_flashdata('gagal', 'Dihapus');
            redirect('barangmasuk');
        }
    }

    public function detailBarangMasuk($kd_transaksi)
    {
        $kd_transaksi = $this->uri->segment(3);

        $data = array(
            'title' => 'Detail Data Barang Masuk',
            'active_menu_transaksi_masuk' => 'menu-open',
            'active_menu_trns_msuk' => 'active',
            'active_menu_barangmasuk' => 'active',
            'kd_transaksi' => $kd_transaksi,
            'barangmasuk' => $this->mbm->getDataBarangMasukHeaderKd($kd_transaksi),
            'barangmasukdetail' => $this->mbm->getDatabarangmasukDetail($kd_transaksi),
            'barang' => $this->mb->getDataBarang(),
            'kategori' => $this->mk->getKategoriBarang(),
            'satuan' => $this->mst->getDataSatuan(),
            // 'kd_transaksi' => $this->mbm->CreateCode(),
            // 'supplier' => $this->ms->getDataSupplier(),
        );

        $this->load->view('layouts/header', $data);
        $this->load->view('permintaan/c_barangmasukdetail', $data);
        $this->load->view('layouts/footer');
    }

    public function storebarangmasukdetail()
    {
        $kd_transaksi = $this->input->post('kd_transaksi');
        $data = array(
            'kd_transaksi' => $this->input->post('kd_transaksi'),
            'no_invoice' => $this->input->post('no_invoice'),
            'nama_supplier' => $this->input->post('nama_supplier'),
            'tanggal' => $this->input->post('tanggal'),
            // 'kd_barang' => $this->input->post('kd_barang'),
            'nama_barang' => $this->input->post('nama_barang'),
            'nama_satuan' => $this->input->post('nama_satuan'),
            'nama_kategori' => $this->input->post('nama_kategori'),
            'jumlah' => $this->input->post('jumlah'),
        );

        $result = $this->mbm->Modelstorebarangmasukdetail($data);

        if ($result >= 1) {
            $this->session->set_flashdata('sukses', 'Disimpan');

            redirect('barangmasuk/detail/' . $kd_transaksi);
        } else {
            $this->session->set_flashdata('gagal', 'Disimpan');
            redirect('barangmasuk/detail/' . $kd_transaksi);
        }
    }

    public function hapusBarangMasukDetail($id, $data = '')
    {
        // $kd_transaksi = $this->input->get('kd_transaksi');
        $id = $this->uri->segment(3);
        $where = array('id' => $id);
        $ok = $data['kd_transaksi'];
        $res = $this->mbm->deletebarangmasukdetail($where);
        if ($res >= 1) {
            $this->session->set_flashdata('sukses', 'Dihapus');

            redirect('barangmasuk/detail/' . $ok);
        } else {
            $this->session->set_flashdata('gagal', 'Dihapus');
            redirect('barangmasuk');
        }
    }
}

/* End of file barangmasuk.php */
/* Location: ./application/controllers/barangmasuk.php */