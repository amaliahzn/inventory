<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelPermintaan extends CI_Model
{

	public function getDatapermintaan()
	{
		// $this->db->select('*');
		$this->db->distinct('');
		$this->db->select('ruang,tgl_permintaan,nama');
		$this->db->from('permintaan a');
		$this->db->join('barang b', 'b.kd_barang = a.kd_barang');
		// $this->db->join('kategori_barang c', 'c.id_kategori_barang = a.id_kategori_barang');
		$this->db->where('status_kasubag !=', 1);
		$this->db->where('status_kasubag !=', 2);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getPermintaan($id)
	{
		$this->db->select('*');
		$this->db->from('permintaan');
		$this->db->where('id', $id);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getDatapermintaanall($id)
	{
		$this->db->select('status_kasubag');
		// $this->db->select('ruang,tgl_permintaan,nama');
		$this->db->from('permintaan');
		// $this->db->join('kategori_barang c', 'c.id_kategori_barang = a.id_kategori_barang');
		$this->db->where('id', $id);
		// $this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getDatapermintaankabag()
	{
		// $this->db->select('*');
		$this->db->distinct('');
		$this->db->select('ruang,tgl_permintaan,nama');
		$this->db->from('permintaan a');
		$this->db->join('barang b', 'b.kd_barang = a.kd_barang');
		// $this->db->join('kategori_barang c', 'c.id_kategori_barang = a.id_kategori_barang');
		$this->db->where('status_kabag !=', 1);
		$this->db->where('status_kabag !=', 2);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getDatapermintaanruangan()
	{
		// $this->db->select('*');
		$this->db->distinct('');
		$this->db->select('ruang,tgl_permintaan,nama');
		$this->db->from('permintaan a');
		$this->db->join('barang b', 'b.kd_barang = a.kd_barang');
		// $this->db->join('kategori_barang c', 'c.id_kategori_barang = a.id_kategori_barang');
		$this->db->where('status_kasubag !=', 1);
		$this->db->where('status_kasubag !=', 2);
		$this->db->where('status_kabag !=', 1);
		$this->db->where('status_kabag !=', 2);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getDetailDatapermintaan($tgl_permintaan, $ruang)
	{

		$this->db->select('*');
		$this->db->from('permintaan');
		// $this->db->join('barang b', 'b.kd_barang = a.kd_barang');
		// $this->db->where('tgl_permintaan', $tgl_permintaan);
		// $this->db->where('ruang', $ruang);
		$this->db->where('tgl_permintaan', $tgl_permintaan);
		$this->db->where('ruang', $ruang);
		// $this->db->where('status_kasubag !=', 0);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getDetailDatapermintaanbelumacc($tgl_permintaan, $ruang)
	{

		$this->db->select('*');
		$this->db->from('permintaan');
		// $this->db->join('barang b', 'b.kd_barang = a.kd_barang');
		// $this->db->where('tgl_permintaan', $tgl_permintaan);
		// $this->db->where('ruang', $ruang);
		$this->db->where('tgl_permintaan', $tgl_permintaan);
		$this->db->where('ruang', $ruang);
		// $this->db->where('status_kasubag !=', 0);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function updatePermintaan($id, $data)
	{
		$this->db->where(array('id' => $id));
		$res = $this->db->update('permintaan', $data);
		return $res;
	}

	public function getDatapermintaansemua()
	{
		// $this->db->select('*');
		$this->db->distinct('');
		$this->db->select('ruang,tgl_permintaan,nama');
		$this->db->from('permintaan a');
		$this->db->join('barang b', 'b.kd_barang = a.kd_barang');
		// $this->db->join('kategori_barang c', 'c.id_kategori_barang = a.id_kategori_barang');
		$this->db->where('status_kasubag !=', 0);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function storepengeluaran($pengeluaran)
	{
		$query = $this->db->insert('pengeluaran', $pengeluaran);
		return $query;
	}

	public function storepermintaan($data)
	{
		$query = $this->db->insert('permintaan', $data);
		return $query;
	}


	public function deletepermintaan($where)
	{
		$this->db->where($where);
		$res = $this->db->delete("permintaan");
		return $res;
	}

	public function totalPermintaan($nama_user, $tgl_permintaan)
	{
		$this->db->select('nama');
		$this->db->from('permintaan');
		$this->db->where('nama', $nama_user);
		$this->db->where('tgl_permintaan', $tgl_permintaan);
		$this->db->where('status_kabag !=', 0);
		$this->db->where('status_kasubag !=', 0);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function totalPermintaanSemua()
	{
		$this->db->select('*');
		$this->db->from('permintaan');
		$query = $this->db->get();
		return $query->num_rows();
	}
}

/* End of file Modelpermintaan.php */
/* Location: ./application/models/Modelpermintaan.php */