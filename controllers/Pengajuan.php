<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata("logged") <> 1) {
			redirect(site_url('login'));
		}

		//load model
		$this->load->model('ModelPermintaan', 'mp');
		$this->load->model('ModelPengajuan', 'mpe');
		$this->load->model('ModelBarang', 'mb');
		$this->load->model('ModelKategori', 'mjb');
	}

	//menampilkan data permintaan
	public function index()
	{
		$data = array(
			'title' => 'Data Pengajuan Barang',
			'active_menu_pengajuan' => 'menu-open',
			'active_menu_pngj' => 'active',
			'active_menu_pngjbrg' => 'active',
			'pengajuan' => $this->mpe->getDatapengajuan(),
		);

		$this->load->view('layouts/header', $data);
		$this->load->view('pengajuan/v_pengajuan', $data);
		$this->load->view('layouts/footer');
	}

	public function Detailpermintaan($tgl_permintaan, $ruang)
	{
		$tgl_permintaan = $this->uri->segment(3);
		$ruang = $this->uri->segment(4);
		$data = array(
			'title' => 'Data Detail permintaan Barang',
			'active_menu_permintaan' => 'menu-open',
			'active_menu_pmt' => 'active',
			'active_menu_pmtbrg' => 'active',
			'barang' => $this->mb->getDataBarang(),
			'detailpermintaan' => $this->mp->getDetailDatapermintaan($tgl_permintaan, $ruang)
		);

		$this->load->view('layouts/header', $data);
		$this->load->view('permintaan/v_detailpermintaan', $data);
		$this->load->view('layouts/footer');
	}

	public function setujuiPermintaan($id)
	{
		$id = $this->uri->segment(3);
		$data['status_kasubag'] = '1';
		unset($data['id']);
		$result = $this->mp->updatePermintaan($id, $data);
		if ($result >= 1) {
			$this->session->set_flashdata('sukses', 'Disetujui');
			redirect($_SERVER['HTTP_REFERER'], 'refresh');
		} else {
			$this->session->set_flashdata('gagal', 'Disetujui');
			redirect($_SERVER['HTTP_REFERER'], 'refresh');
		}
	}
	public function tolakPermintaan($id)
	{
		$tgl_permintaan = $this->input->post('tgl_permintaan');
		$ruang = $this->input->post('ruang');
		$id = $this->uri->segment(3);
		$data['status_kasubag'] = '2';
		unset($data['id']);
		$result = $this->mp->updatePermintaan($id, $data);
		if ($result >= 1) {
			$this->session->set_flashdata('sukses', 'Disetujui');
			redirect($_SERVER['HTTP_REFERER'], 'refresh');
		} else {
			$this->session->set_flashdata('gagal', 'Disetujui');
			redirect($_SERVER['HTTP_REFERER'], 'refresh');
		}
	}

	public function updatePermintaanBarang()
	{
		$tgl_permintaan = $this->input->post('tgl_permintaan');
		$ruang = $this->input->post('ruang');
		$id = $this->input->post('id');
		$data = $this->input->post(null, true);
		unset($data['id']);
		$result = $this->mp->updatepermintaan($id, $data);
		if ($result >= 1) {
			$this->session->set_flashdata('sukses', 'Diubah');
			redirect('permintaanbarang/detail/' . $tgl_permintaan . '/' . $ruang);
		} else {
			$this->session->set_flashdata('gagal', 'Diubah');
			redirect('permintaanbarang/detail/' . $tgl_permintaan . '/' . $ruang);
		}
	}

	public function datapermintaanbarang()
	{
		$data = array(
			'title' => 'Data permintaan Barang Keluar',
			'active_menu_permintaan' => 'menu-open',
			'active_menu_pmt' => 'active',
			'active_menu_datapermintaanbarang' => 'active',
			'permintaan' => $this->mp->getDatapermintaansemua(),
		);

		$this->load->view('layouts/header', $data);
		$this->load->view('permintaan/v_permintaanbarangkeluar', $data);
		$this->load->view('layouts/footer');
	}

	public function tambahpermintaan()
	{
		$data = array(
			'title' => 'Data permintaan Barang',
			'active_menu_permintaanbarang' => 'menu-open',
			'active_menu_permintaan' => 'active',
			'active_menu_pmt' => 'active',
			'jb' => $this->mp->getKategoripermintaan()
		);

		$this->load->view('layouts/header', $data);
		$this->load->view('master/c_permintaan', $data);
		$this->load->view('layouts/footer');
	}

	public function simpanpermintaan()
	{
		$data = $this->input->post(null, true);
		$result = $this->mb->storepermintaan($data);

		if ($result >= 1) {
			$this->session->set_flashdata('sukses', 'Disimpan');
			redirect('permintaan');
		} else {
			$this->session->set_flashdata('gagal', 'Disimpan');
			redirect('permintaan/tambah');
		}
	}

	public function editpermintaan($id_permintaan)
	{
		$id_permintaan = $this->uri->segment(3);

		$data = array(
			'title' => 'Data permintaan',
			'active_menu_master' => 'menu-open',
			'active_menu_mst' => 'active',
			'active_menu_brg' => 'active',
			'brg' => $this->mb->getDetailpermintaan($id_permintaan),
			'jb' => $this->mjb->getKategoripermintaan()
		);

		$this->load->view('layouts/header', $data);
		$this->load->view('master/u_permintaan', $data);
		$this->load->view('layouts/footer');
	}


	public function ubahpermintaan()
	{
		$id_permintaan = $this->input->post('id_permintaan');
		$data = $this->input->post(null, true);
		unset($data['id_permintaan']);
		$result = $this->mb->updatepermintaan($id_permintaan, $data);
		if ($result >= 1) {
			$this->session->set_flashdata('sukses', 'Diubah');
			redirect('permintaan');
		} else {
			$this->session->set_flashdata('gagal', 'Diubah');
			redirect('permintaan/edit/' . $id_permintaan);
		}
	}

	public function hapuspermintaan($id_permintaan)
	{
		$id_permintaan = $this->uri->segment(3);
		$where = array('id_permintaan' => $id_permintaan);
		$res = $this->mb->deletepermintaan($where);
		if ($res >= 1) {
			$this->session->set_flashdata('sukses', 'Dihapus');
			redirect('permintaan');
		} else {
			$this->session->set_flashdata('gagal', 'Dihapus');
			redirect('permintaan');
		}
	}
}

/* End of file Barang.php */
/* Location: ./application/controllers/Barang.php */