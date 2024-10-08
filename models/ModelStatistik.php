<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelStatistik extends CI_Model
{

	public function totalSatuan()
	{
		$this->db->from('satuan');
		$this->db->select('*');
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function totalKategori()
	{
		$this->db->from('kategori_barang');
		$this->db->select('*');
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function totalsupplaier()
	{
		$this->db->from('supplier');
		$this->db->select('*');
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function totalbarangmasuk()
	{
		$this->db->from('barangmasuk_detail');
		$this->db->select('*');
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function totalbarangkeluar()
	{
		$this->db->from('barangkeluar_detail');
		$this->db->select('*');
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function totalpengadaan()
	{
		$this->db->from('pengadaan');
		$this->db->select('*');
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function totalpeminjaman()
	{
		$this->db->from('peminjaman');
		$this->db->select('*');
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function totaluser()
	{
		$this->db->from('users');
		$this->db->select('*');
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function getKondisiAset()
	{
		$this->db->select('COUNT(kondisi) as kon');
		$this->db->from('asets');
		$this->db->where('volume !=', 0);
		$this->db->where('volume >', 0);
		$this->db->group_by('kondisi');
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}

	public function getJenisAset()
	{
		$this->db->select('COUNT(status_aset) as status');
		$this->db->from('asets a');
		$this->db->group_by('status_aset');
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}

	public function getNamaKategoriAset()
	{
		$this->db->select('nama_kategori');
		$this->db->from('asets a');
		$this->db->join('barang b', 'b.id_barang = a.id_barang');
		$this->db->join('kategori_barang c', 'c.id_kategori = b.id_kategori');
		$this->db->where('status_aset', 'Aktif');
		$this->db->group_by('nama_kategori');
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}

	public function getKodeKategoriAset()
	{
		$this->db->select('COUNT(kode_kategori) AS kategori');
		$this->db->from('asets a');
		$this->db->join('barang b', 'b.nama_kategori = a.id_barang');
		$this->db->join('kategori_barang c', 'c.nama_kategori = b.nama_kategori');
		$this->db->where('volume !=', 0);
		$this->db->where('volume >', 0);
		$this->db->group_by('kode_kategori');
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}

	public function getAsetWujud()
	{
		$this->db->select('*');
		$this->db->from('asets a');
		$this->db->join('barang b', 'b.id_barang = a.id_barang');
		$this->db->where('volume !=', 0);
		$this->db->where('volume >', 0);
		$query = $this->db->get();
		return $query->num_rows();
	}
}

/* End of file ModelStatistik.php */
/* Location: ./application/models/ModelStatistik.php */