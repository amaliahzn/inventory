<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satuan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata("logged") <> 1) {
			redirect(site_url('login'));
		}

		//load model user
		$this->load->model('ModelSatuan', 'ms');
	}

	//menampilkan data user
	public function index()
	{
		$data = array(
			'title' => 'Data User',
			'active_menu_master' => 'menu-open',
			'active_menu_mst' => 'active',
			'active_menu_satuan' => 'active',
			'satuan' => $this->ms->getDatasatuan()
		);
		$this->load->view('layouts/header', $data);
		$this->load->view('master/v_satuan', $data);
		$this->load->view('layouts/footer');
	}

	public function store()
	{
		$data = $this->input->post(null, true);
		$result = $this->ms->storesatuan($data);

		if ($result >= 1) {
			$this->session->set_flashdata('sukses', 'Disimpan');
			redirect('satuan');
		} else {
			$this->session->set_flashdata('gagal', 'Disimpan');
			redirect('satuan');
		}
	}

	public function ubah()
	{
		$id_satuan = $this->input->post('id_satuan');
		$data = $this->input->post(null, true);
		unset($data['id_satuan']);
		$result = $this->ms->updateSatuan($id_satuan, $data);

		if ($result >= 1) {
			$this->session->set_flashdata('sukses', 'Diubah');
			redirect('satuan');
		} else {
			$this->session->set_flashdata('gagal', 'Diubah');
			redirect('satuan');
		}
	}

	public function hapus($id_satuan)
	{
		$id_satuan = $this->uri->segment(3);
		$where = array('id_satuan' => $id_satuan);
		$res = $this->ms->deleteSatuan($where);
		if ($res >= 1) {
			$this->session->set_flashdata('sukses', 'Dihapus');
			redirect('satuan');
		} else {
			$this->session->set_flashdata('gagal', 'Dihapus');
			redirect('satuan');
		}
	}
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */