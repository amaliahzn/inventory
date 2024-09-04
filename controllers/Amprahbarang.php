<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Amprahbarang extends CI_Controller
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
        $this->load->model('ModelAmprahBarang', 'mab');
        $this->load->model('ModelPermintaan', 'mp');
        $this->load->model('ModelLaporan', 'ml');
    }

    //menampilkan data barang
    public function index()
    {
        $nama_user = $this->session->userdata('nama_user');
        $data = array(
            'title' => 'Amprah Barang',
            'active_menu_amprah_barang' => 'menu-open',
            'active_menu_amba' => 'active',
            'active_menu_amprahbarang' => 'active',
            'amprahbarang' => $this->mab->getDataAmprahBarangUser($nama_user),

        );

        $this->load->view('layouts/header', $data);
        $this->load->view('amprahbarang/v_amprahbarang', $data);
        $this->load->view('layouts/footer');
    }
    public function DaftaramprahBelumacc()
    {
        $nama_user = $this->session->userdata('nama_user');
        $tgl_permintaan = $this->input->get('tgl_permintaan');
        $data = array(
            'title' => 'Amprah Barang',
            'active_menu_amprah_barang' => 'menu-open',
            'active_menu_amba' => 'active',
            'active_menu_daftaramprahbarangbelumacc' => 'active',
            'amprahbarang' => $this->mab->getDaftarDataAmprahBarangBelumAcc($nama_user),
        );

        $this->load->view('layouts/header', $data);
        $this->load->view('amprahbarang/v_daftaramprahbarangbelumacc', $data);
        $this->load->view('layouts/footer');
    }

    public function DetailDaftarAmprahBarangBelumacc($tgl_permintaan, $ruang)
    {
        $tgl_permintaan = $this->uri->segment(3);
        $ruang = $this->uri->segment(4);
        $data = array(
            'title' => 'Amprah Barang',
            'active_menu_amprah_barang' => 'menu-open',
            'active_menu_amba' => 'active',
            'active_menu_daftaramprahbarangbelumacc' => 'active',
            'barang' => $this->mb->getDataBarang(),
            'detailpermintaanbelumacc' => $this->mp->getDetailDatapermintaanbelumacc($tgl_permintaan, $ruang)
        );

        $this->load->view('layouts/header', $data);
        $this->load->view('amprahbarang/v_detailamprahbarangbelumacc', $data);
        $this->load->view('layouts/footer');
    }
    public function DaftarAmprah()
    {
        $nama_user = $this->session->userdata('nama_user');
        $tgl_permintaan = $this->input->get('tgl_permintaan');
        $data = array(
            'title' => 'Amprah Barang',
            'active_menu_amprah_barang' => 'menu-open',
            'active_menu_amba' => 'active',
            'active_menu_daftaramprahbarang' => 'active',
            'amprahbarang' => $this->mab->getDaftarDataAmprahBarangUser($nama_user),
            'totalpermintaan' => $this->mp->totalPermintaan($nama_user, $tgl_permintaan),

        );

        $this->load->view('layouts/header', $data);
        $this->load->view('amprahbarang/v_daftaramprahbarang', $data);
        $this->load->view('layouts/footer');
    }

    public function DetailDaftarAmprahBarang($tgl_permintaan, $ruang)
    {
        $tgl_permintaan = $this->uri->segment(3);
        $ruang = $this->uri->segment(4);
        $data = array(
            'title' => 'Amprah Barang',
            'active_menu_amprah_barang' => 'menu-open',
            'active_menu_amba' => 'active',
            'active_menu_daftaramprahbarang' => 'active',
            'barang' => $this->mb->getDataBarang(),
            'detailpermintaan' => $this->mp->getDetailDatapermintaan($tgl_permintaan, $ruang)
        );

        $this->load->view('layouts/header', $data);
        $this->load->view('amprahbarang/v_detailamprahbarang', $data);
        $this->load->view('layouts/footer');
    }

    public function printAmprahBarang($tgl_permintaan, $ruang)
    {
        $tgl_permintaan = $this->uri->segment(3);
        $ruang = $this->uri->segment(4);
        $nama_user = $this->session->userdata('nama_user');
        $data['detailpermintaan'] = $this->mp->getDetailDatapermintaan($tgl_permintaan, $ruang);
        // $data['user'] = $this->mp->getDetailDatapermintaan($tgl_permintaan, $ruang);
        $data['user'] =  $this->mab->getDataAmprahBarangUser($nama_user);

        if (count($data['detailpermintaan']) > 0) {
            $this->load->view('laporan/p_daftaramprahbarang', $data);
        } else {
            $this->session->set_flashdata('gagal', 'Ditemukan');
            redirect('amprahbarang/daftaramprah');
        }
    }


    public function tambahAmprahBarang()
    {
        $nama_user = $this->session->userdata('nama_user');
        $data = array(
            'title' => 'Data Barang Masuk',
            'active_menu_transaksi_masuk' => 'menu-open',
            'active_menu_trns_msuk' => 'active',
            'active_menu_barangmasuk' => 'active',
            'kd_amprah' => $this->mab->CreateCode(),
            'barang' => $this->mb->getDataBarang(),
            'supplier' => $this->ms->getDataSupplier(),
            'user' => $this->mab->getDataUser($nama_user),
        );

        $this->load->view('layouts/header', $data);
        $this->load->view('amprahbarang/c_barangamprah', $data);
        $this->load->view('layouts/footer');
    }

    public function simpanAmprahBarangHeader()
    {
        $kd_amprah = $this->input->post('kd_amprah');
        $data = array(
            'kd_amprah' => $this->input->post('kd_amprah'),
            'nama' => $this->input->post('nama'),
            'ruangan' => $this->input->post('ruangan'),
            'created_at' => date('Y-m-d H:i:s')
        );
        $result = $this->mab->storeAmprahBarangHeader($data);

        if ($result >= 1) {
            $this->session->set_flashdata('sukses', 'Disimpan');
            redirect('amprahbarang/tambahdetail/' . $kd_amprah);
        } else {
            $this->session->set_flashdata('gagal', 'Disimpan');
            redirect('amprahbarang/tambah');
        }
    }

    public function TambahDetailAmprahBarang($kd_amprah)
    {
        $kd_amprah = $this->uri->segment(3);
        $nama_user = $this->session->userdata('nama_user');
        $data = array(
            'title' => 'Amprah Barang',
            'active_menu_amprah_barang' => 'menu-open',
            'active_menu_amba' => 'active',
            'active_menu_amprahbarang' => 'active',
            'kd_amprah' => $this->mab->CreateCode(),
            'barang' => $this->mb->getDataBarang(),
            'supplier' => $this->ms->getDataSupplier(),
            'user' => $this->mab->getDataUser($nama_user),
            'permintaan_header' => $this->mab->getDataamprahbarangHeaderKd($kd_amprah),
            'permintaan' => $this->mab->getDataDetailAmprah($kd_amprah),
        );

        $this->load->view('layouts/header', $data);
        $this->load->view('amprahbarang/c_amprahbarangdetail', $data);
        $this->load->view('layouts/footer');
    }

    public function editBarangMasuk($id_barangmasuk)
    {
        $id_barangmasuk = $this->uri->segment(3);

        $data = array(
            'title' => 'Data Barang Masuk',
            'active_menu_transaksi_masuk' => 'menu-open',
            'active_menu_trns_msuk' => 'active',
            'active_menu_barangmasuk' => 'active',
            'barangmasuk' => $this->mab->getDataBarangMasukHeader($id_barangmasuk),
            'supplier' => $this->ms->getDataSupplier(),
        );

        $this->load->view('layouts/header', $data);
        $this->load->view('amprahbarang/u_barangmasuk', $data);
        $this->load->view('layouts/footer');
    }

    public function ubahBarangMasuk()
    {
        $id_barangmasuk = $this->input->post('id_barangmasuk');
        $data = $this->input->post(null, true);
        unset($data['id_barangmasuk']);
        $result = $this->mab->updatebarangmasuk($id_barangmasuk, $data);
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
        $res = $this->mab->deletebarangmasuk($where);
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
            'barangmasuk' => $this->mab->getDataBarangMasukHeaderKd($kd_transaksi),
            'barangmasukdetail' => $this->mab->getDatabarangmasukDetail($kd_transaksi),
            'barang' => $this->mb->getDataBarang(),
            // 'kd_transaksi' => $this->mab->CreateCode(),
            // 'supplier' => $this->ms->getDataSupplier(),
        );

        $this->load->view('layouts/header', $data);
        $this->load->view('amprahbarang/c_barangmasukdetail', $data);
        $this->load->view('layouts/footer');
    }

    public function storeDetailAmprahBarang()
    {
        $kd_amprah = $this->input->post('kd_amprah');
        $data = array(
            'kd_amprah' => $this->input->post('kd_amprah'),
            'nama' => $this->input->post('nama'),
            'ruang' => $this->input->post('ruang'),
            'tgl_permintaan' => date('Y-m-d'),
            'kd_barang' => $this->input->post('kd_barang'),
            'nama_barang' => $this->input->post('nama_barang'),
            'nama_satuan' => $this->input->post('nama_satuan'),
            'nama_kategori' => $this->input->post('nama_kategori'),
            'jumlah' => $this->input->post('jumlah'),
        );

        $result = $this->mab->storeamprahbarangdetail($data);

        if ($result >= 1) {
            $this->session->set_flashdata('sukses', 'Disimpan');

            redirect('amprahbarang/tambahdetail/' . $kd_amprah);
        } else {
            $this->session->set_flashdata('gagal', 'Disimpan');
            redirect('amprahbarang/tambahdetail/' . $kd_amprah);
        }
    }

    public function hapusAmprahBarangDetail($id, $data = '')
    {
        // $kd_transaksi = $this->input->get('kd_transaksi');
        $id = $this->uri->segment(3);
        $where = array('id' => $id);
        $ok = $data['kd_amprah'];
        $res = $this->mab->deleteamprahbarangdetail($where);
        if ($res >= 1) {
            $this->session->set_flashdata('sukses', 'Dihapus');

            redirect('amprahbarang/detail/' . $ok);
        } else {
            $this->session->set_flashdata('gagal', 'Dihapus');
            redirect('amprahbarang');
        }
    }
}

/* End of file barangmasuk.php */
/* Location: ./application/controllers/barangmasuk.php */