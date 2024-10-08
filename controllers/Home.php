<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata("logged") <> 1) {
            redirect(site_url('login'));
        }

        $this->load->model('ModelAset', 'ma');
        $this->load->model('ModelPermintaan', 'mp');
        $this->load->model('ModelBarang', 'mb');
        $this->load->model('ModelStatistik', 'ms');
    }

    public function index()
    {
        $data = array(
            'title' => 'Dashboard',
            'active_menu_db' => 'active',
            'satuan' => $this->ms->totalSatuan(),
            'kategori' => $this->ms->totalKategori(),
            'supplaier' => $this->ms->totalsupplaier(),
            'user' => $this->ms->totaluser(),
            'barangmasuk' => $this->ms->totalbarangmasuk(),
            'barangkeluar' => $this->ms->totalbarangkeluar(), 
            'pengadaan' => $this->ms->totalpengadaan(), 
            // 'peminjaman' => $this->ms->totalpeminjaman(),
            // 'kondisi' => $this->ms->getKondisiAset(),
            // 'kode' => $this->ms->getKodeKategoriAset(),
            // 'ktgr' => $this->ms->getNamaKategoriAset(),
            // 'bw' => $this->ms->getAsetWujud(),
            'barang' => $this->mb->totalBarang(),
            'permintaan' => $this->mp->totalPermintaanSemua(),
            'aset' => $this->ma->totalAset(),
            'wujud' => $this->ma->totalAsetWujud(),
            'hapuskan' => $this->ma->totalAsetHapuskan(),
            'ph' => $this->db->get('penghapusan')->num_rows()

        );
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/content', $data);
        $this->load->view('layouts/footer');
    }
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */