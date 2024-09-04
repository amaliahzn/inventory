<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengadaan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata("logged") <> 1) {
            redirect(site_url('login'));
        }

        //load model
        $this->load->model('ModelBarang', 'mb');
        $this->load->model('ModelSupplier', 'ms');
        $this->load->model('ModelPengadaan', 'mp');
        $this->load->model('ModelKategori', 'mk');
        $this->load->model('ModelSatuan', 'mst');
    }

    //menampilkan data barang
    public function index()
    {

        $data = array(
            'title' => 'Data pengadaan',
            'active_menu_pngdaan' => 'menu-open',
            'active_menu_pngdaan' => 'active',
            'pengadaan' => $this->mp->getDatapengadaan(),
            'kd_pengadaan' => $this->mp->CreateCode()
        );

        $this->load->view('layouts/header', $data);
        $this->load->view('pengadaan/v_pengadaan', $data);
        $this->load->view('layouts/footer');
    }


    public function tambahpengadaan()
    {
        $data = array(
            'title' => 'Data pengadaan',
            'active_menu_pngdaan' => 'menu-open',
            'active_menu_pngdaan' => 'active',
            'kd_pengadaan' => $this->mp->CreateCode(),

        );

        $this->load->view('layouts/header', $data);
        $this->load->view('pengadaan/c_pengadaan', $data);
        $this->load->view('layouts/footer');
    }

    public function simpanpengadaan()
    {
        $data = $this->input->post(null, true);
        $result = $this->mp->storepengadaan($data);

        if ($result >= 1) {
            $this->session->set_flashdata('sukses', 'Disimpan');
            redirect('pengadaan');
        } else {
            $this->session->set_flashdata('gagal', 'Disimpan');
            redirect('pengadaan/tambah');
        }
    }

    public function editpengadaan($id)
    {
        $id = $this->uri->segment(3);

        $data = array(
            'title' => 'Data pengadaan',
            'active_menu_pnjm' => 'menu-open',
            'active_menu_pnjm' => 'active',
            'pengadaan' => $this->mp->getDatapengadaanHeader($id),

        );

        $this->load->view('layouts/header', $data);
        $this->load->view('pengadaan/u_pengadaan', $data);
        $this->load->view('layouts/footer');
    }

    public function ubahpengadaan()
    {
        $id = $this->input->post('id');
        $data = $this->input->post(null, true);
        unset($data['id']);
        $result = $this->mp->updatepengadaan($id, $data);
        if ($result >= 1) {
            $this->session->set_flashdata('sukses', 'Diubah');
            redirect('pengadaan');
        } else {
            $this->session->set_flashdata('gagal', 'Diubah');
            redirect('pengadaan/edit/' . $id);
        }
    }

    public function hapuspengadaan($id)
    {
        $id = $this->uri->segment(3);
        $where = array('id' => $id);
        $res = $this->mp->deletepengadaan($where);
        if ($res >= 1) {
            $this->session->set_flashdata('sukses', 'Dihapus');
            redirect('pengadaan');
        } else {
            $this->session->set_flashdata('gagal', 'Dihapus');
            redirect('pengadaan');
        }
    }

    public function detailpengadaan($kd_pengadaan)
    {
        $kd_pengadaan = $this->uri->segment(3);

        $data = array(
            'title' => 'Data pengadaan',
            'active_menu_pngdaan' => 'menu-open',
            'active_menu_pngdaan' => 'active',
            'kd_pengadaan' => $kd_pengadaan,
            'pengadaan' => $this->mp->getDatapengadaanHeaderKd($kd_pengadaan),
            'barangpengadaandetail' => $this->mp->getDatapengadaanDetail($kd_pengadaan),
            'barang' => $this->mb->getDataBarang(),
            'kategori' => $this->mk->getKategoriBarang(),
            'satuan' => $this->mst->getDataSatuan(),
            // 'kd_pengadaan' => $this->mp->CreateCode(),
            // 'supplier' => $this->ms->getDataSupplier(),
        );

        $this->load->view('layouts/header', $data);
        $this->load->view('pengadaan/c_pengadaandetail', $data);
        $this->load->view('layouts/footer');
    }

    public function storepengadaandetail()
    {
        $kd_pengadaan = $this->input->post('kd_pengadaan');
        $data = array(
            'kd_pengadaan' => $this->input->post('kd_pengadaan'),
            'nama_pengaju' => $this->input->post('nama_pengaju'),
            'tgl_permintaan' => $this->input->post('tgl_permintaan'),
            'tgl_dibutuhkan' => $this->input->post('tgl_dibutuhkan'),
            'keterangan' => $this->input->post('keterangan'),
            'status_pengadaan' => $this->input->post('status_pengadaan'),
            // 'kd_barang' => $this->input->post('kd_barang'),
            'nama_barang' => $this->input->post('nama_barang'),
            'nama_satuan' => $this->input->post('nama_satuan'),
            'nama_kategori' => $this->input->post('nama_kategori'),
            'jumlah' => $this->input->post('jumlah'),
        );

        $result = $this->mp->Modelstorepengadaandetail($data);

        if ($result >= 1) {
            $this->session->set_flashdata('sukses', 'Disimpan');

            redirect('pengadaan/detail/' . $kd_pengadaan);
        } else {
            $this->session->set_flashdata('gagal', 'Disimpan');
            redirect('pengadaan/detail/' . $kd_pengadaan);
        }
    }

    public function hapuspengadaanDetail($id, $data = '')
    {
        // $kd_pengadaan = $this->input->get('kd_pengadaan');
        $id = $this->uri->segment(3);
        $where = array('id' => $id);
        $ok = $data['kd_pengadaan'];
        $res = $this->mp->deletepengadaandetail($where);
        if ($res >= 1) {
            $this->session->set_flashdata('sukses', 'Dihapus');

            redirect('pengadaan/detail/' . $ok);
        } else {
            $this->session->set_flashdata('gagal', 'Dihapus');
            redirect('pengadaan');
        }
    }
}

/* End of file pengadaan.php */
/* Location: ./application/controllers/pengadaan.php */