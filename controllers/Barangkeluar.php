<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barangkeluar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata("logged") <> 1) {
            redirect(site_url('login'));
        }

        //load model
        $this->load->model('ModelBarangKeluar', 'mbk');
        $this->load->model('ModelBarang', 'mb');
        $this->load->model('ModelSupplier', 'ms');
        $this->load->model('ModelKategori', 'mk');
        $this->load->model('ModelSatuan', 'mst');
    }

    //menampilkan data barang
    public function index()
    {

        $data = array(
            'title' => 'Data Barang Keluar',
            'active_menu_transaksi_masuk' => 'menu-open',
            'active_menu_trns_msuk' => 'active',
            'active_menu_barangkeluar' => 'active',
            'barangkeluar' => $this->mbk->getDatabarangkeluar(),
            'kd_transaksi' => $this->mbk->CreateCode()
        );

        $this->load->view('layouts/header', $data);
        $this->load->view('barangkeluar/v_barangkeluar', $data);
        $this->load->view('layouts/footer');
    }


    public function tambahbarangkeluar()
    {
        $data = array(
            'title' => 'Data Barang keluar',
            'active_menu_transaksi_masuk' => 'menu-open',
            'active_menu_trns_msuk' => 'active',
            'active_menu_barangkeluar' => 'active',
            'kd_transaksi' => $this->mbk->CreateCode(),
            'barang' => $this->mb->getDataBarang(),
            'supplier' => $this->ms->getDataSupplier(),
        );

        $this->load->view('layouts/header', $data);
        $this->load->view('barangkeluar/c_barangkeluar', $data);
        $this->load->view('layouts/footer');
    }

    public function simpanbarangkeluar()
    {
        $data = $this->input->post(null, true);
        $result = $this->mbk->storebarangkeluar($data);

        if ($result >= 1) {
            $this->session->set_flashdata('sukses', 'Disimpan');
            redirect('barangkeluar');
        } else {
            $this->session->set_flashdata('gagal', 'Disimpan');
            redirect('barangkeluar/tambah');
        }
    }

    public function editbarangkeluar($id_barangkeluar)
    {
        $id_barangkeluar = $this->uri->segment(3);

        $data = array(
            'title' => 'Data Barang keluar',
            'active_menu_transaksi_keluar' => 'menu-open',
            'active_menu_trns_kluar' => 'active',
            'active_menu_barangkeluar' => 'active',
            'barangkeluar' => $this->mbk->getDatabarangkeluarHeader($id_barangkeluar),
            'supplier' => $this->ms->getDataSupplier(),
        );

        $this->load->view('layouts/header', $data);
        $this->load->view('barangkeluar/u_barangkeluar', $data);
        $this->load->view('layouts/footer');
    }

    public function ubahbarangkeluar()
    {
        $id_barangkeluar = $this->input->post('id_barangkeluar');
        $data = $this->input->post(null, true);
        unset($data['id_barangkeluar']);
        $result = $this->mbk->updatebarangkeluar($id_barangkeluar, $data);
        if ($result >= 1) {
            $this->session->set_flashdata('sukses', 'Diubah');
            redirect('barangkeluar');
        } else {
            $this->session->set_flashdata('gagal', 'Diubah');
            redirect('barangkeluar/edit/' . $id_barangkeluar);
        }
    }

    public function hapusbarangkeluar($id_barangkeluar)
    {
        $id_barangkeluar = $this->uri->segment(3);
        $where = array('id_barangkeluar' => $id_barangkeluar);
        $res = $this->mbk->deletebarangkeluar($where);
        if ($res >= 1) {
            $this->session->set_flashdata('sukses', 'Dihapus');
            redirect('barangkeluar');
        } else {
            $this->session->set_flashdata('gagal', 'Dihapus');
            redirect('barangkeluar');
        }
    }

    public function detailbarangkeluar($kd_transaksi)
    {
        $kd_transaksi = $this->uri->segment(3);

        $data = array(
            'title' => 'Detail Data Barang keluar',
            'active_menu_transaksi_keluar' => 'menu-open',
            'active_menu_trns_kluar' => 'active',
            'active_menu_barangkeluar' => 'active',
            'kd_transaksi' => $kd_transaksi,
            'barangkeluar' => $this->mbk->getDatabarangkeluarHeaderKd($kd_transaksi),
            'barangkeluardetail' => $this->mbk->getDatabarangkeluarDetail($kd_transaksi),
            'barang' => $this->mb->getDataBarang(),
            'kategori' => $this->mk->getKategoriBarang(),
            'satuan' => $this->mst->getDataSatuan(),
            // 'kd_transaksi' => $this->mbk->CreateCode(),
            // 'supplier' => $this->ms->getDataSupplier(),
        );

        $this->load->view('layouts/header', $data);
        $this->load->view('barangkeluar/c_barangkeluardetail', $data);
        $this->load->view('layouts/footer');
    }

    public function storebarangkeluardetail()
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

        $result = $this->mbk->Modelstorebarangkeluardetail($data);

        if ($result >= 1) {
            $this->session->set_flashdata('sukses', 'Disimpan');

            redirect('barangkeluar/detail/' . $kd_transaksi);
        } else {
            $this->session->set_flashdata('gagal', 'Disimpan');
            redirect('barangkeluar/detail/' . $kd_transaksi);
        }
    }

    public function hapusbarangkeluarDetail($id, $data = '')
    {
        // $kd_transaksi = $this->input->get('kd_transaksi');
        $id = $this->uri->segment(3);
        $where = array('id' => $id);
        $ok = $data['kd_transaksi'];
        $res = $this->mbk->deletebarangkeluardetail($where);
        if ($res >= 1) {
            $this->session->set_flashdata('sukses', 'Dihapus');

            redirect('barangkeluar/detail/' . $ok);
        } else {
            $this->session->set_flashdata('gagal', 'Dihapus');
            redirect('barangkeluar');
        }
    }
}

/* End of file barangkeluar.php */
/* Location: ./application/controllers/barangkeluar.php */