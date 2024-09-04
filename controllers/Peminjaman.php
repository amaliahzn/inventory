<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman extends CI_Controller
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
        $this->load->model('ModelPeminjaman', 'mp');
    }

    //menampilkan data barang
    public function index()
    {

        $data = array(
            'title' => 'Data Peminjaman',
            'active_menu_pnjm' => 'menu-open',
            'active_menu_pnjm' => 'active',
            'peminjaman' => $this->mp->getDataPeminjaman(),
            'kd_peminjaman' => $this->mp->CreateCode()
        );

        $this->load->view('layouts/header', $data);
        $this->load->view('peminjaman/v_peminjaman', $data);
        $this->load->view('layouts/footer');
    }


    public function tambahpeminjaman()
    {
        $data = array(
            'title' => 'Data Peminjaman',
            'active_menu_pnjm' => 'menu-open',
            'active_menu_pnjm' => 'active',
            'kd_peminjaman' => $this->mp->CreateCode(),

        );

        $this->load->view('layouts/header', $data);
        $this->load->view('peminjaman/c_peminjaman', $data);
        $this->load->view('layouts/footer');
    }

    public function simpanpeminjaman()
    {
        $data = $this->input->post(null, true);
        $result = $this->mp->storepeminjaman($data);

        if ($result >= 1) {
            $this->session->set_flashdata('sukses', 'Disimpan');
            redirect('peminjaman');
        } else {
            $this->session->set_flashdata('gagal', 'Disimpan');
            redirect('peminjaman/tambah');
        }
    }

    public function editpeminjaman($id)
    {
        $id = $this->uri->segment(3);

        $data = array(
            'title' => 'Data Peminjaman',
            'active_menu_pnjm' => 'menu-open',
            'active_menu_pnjm' => 'active',
            'peminjaman' => $this->mp->getDatapeminjamanHeader($id),

        );

        $this->load->view('layouts/header', $data);
        $this->load->view('peminjaman/u_peminjaman', $data);
        $this->load->view('layouts/footer');
    }

    public function ubahpeminjaman()
    {
        $id = $this->input->post('id');
        $data = $this->input->post(null, true);
        unset($data['id']);
        $result = $this->mp->updatepeminjaman($id, $data);
        if ($result >= 1) {
            $this->session->set_flashdata('sukses', 'Diubah');
            redirect('peminjaman');
        } else {
            $this->session->set_flashdata('gagal', 'Diubah');
            redirect('peminjaman/edit/' . $id);
        }
    }

    public function hapuspeminjaman($id)
    {
        $id = $this->uri->segment(3);
        $where = array('id' => $id);
        $res = $this->mp->deletepeminjaman($where);
        if ($res >= 1) {
            $this->session->set_flashdata('sukses', 'Dihapus');
            redirect('peminjaman');
        } else {
            $this->session->set_flashdata('gagal', 'Dihapus');
            redirect('peminjaman');
        }
    }

    public function detailpeminjaman($kd_peminjaman)
    {
        $kd_peminjaman = $this->uri->segment(3);

        $data = array(
            'title' => 'Data Peminjaman',
            'active_menu_pnjm' => 'menu-open',
            'active_menu_pnjm' => 'active',
            'kd_peminjaman' => $kd_peminjaman,
            'peminjaman' => $this->mp->getDatapeminjamanHeaderKd($kd_peminjaman),
            'barangpeminjamandetail' => $this->mp->getDatapeminjamanDetail($kd_peminjaman),
            'barang' => $this->mb->getDataBarang(),
            // 'kd_peminjaman' => $this->mp->CreateCode(),
            // 'supplier' => $this->ms->getDataSupplier(),
        );

        $this->load->view('layouts/header', $data);
        $this->load->view('peminjaman/c_peminjamandetail', $data);
        $this->load->view('layouts/footer');
    }

    public function storepeminjamandetail()
    {
        $kd_peminjaman = $this->input->post('kd_peminjaman');
        $data = array(
            'kd_peminjaman' => $this->input->post('kd_peminjaman'),
            'nama' => $this->input->post('nama'),
            'tanggal_pinjam' => $this->input->post('tanggal_pinjam'),
            'tanggal_kembali' => $this->input->post('tanggal_kembali'),
            'keterangan' => $this->input->post('keterangan'),
            'kd_barang' => $this->input->post('kd_barang'),
            'nama_barang' => $this->input->post('nama_barang'),
            'nama_satuan' => $this->input->post('nama_satuan'),
            'nama_kategori' => $this->input->post('nama_kategori'),
            'jumlah' => $this->input->post('jumlah'),
        );

        $result = $this->mp->Modelstorepeminjamandetail($data);

        if ($result >= 1) {
            $this->session->set_flashdata('sukses', 'Disimpan');

            redirect('peminjaman/detail/' . $kd_peminjaman);
        } else {
            $this->session->set_flashdata('gagal', 'Disimpan');
            redirect('peminjaman/detail/' . $kd_peminjaman);
        }
    }

    public function hapuspeminjamanDetail($id, $data = '')
    {
        // $kd_peminjaman = $this->input->get('kd_peminjaman');
        $id = $this->uri->segment(3);
        $where = array('id' => $id);
        $ok = $data['kd_peminjaman'];
        $res = $this->mp->deletepeminjamandetail($where);
        if ($res >= 1) {
            $this->session->set_flashdata('sukses', 'Dihapus');

            redirect('peminjaman/detail/' . $ok);
        } else {
            $this->session->set_flashdata('gagal', 'Dihapus');
            redirect('peminjaman');
        }
    }
}

/* End of file peminjaman.php */
/* Location: ./application/controllers/peminjaman.php */