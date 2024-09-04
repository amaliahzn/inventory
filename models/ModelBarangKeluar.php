<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelBarangKeluar extends CI_Model
{

    public function CreateCode()
    {
        $this->db->select('RIGHT(barangkeluar.kd_transaksi,3) as kd_transaksi', FALSE);
        $this->db->order_by('kd_transaksi', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('barangkeluar');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kd_transaksi) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $tahun = date("Y");
        $kodetampil = "OUT-" . $tahun . "-" . $batas;
        return $kodetampil;
    }
    public function getDataBarangkeluar()
    {
        $this->db->select('*');
        $this->db->from('barangkeluar');
        $this->db->order_by('id_barangkeluar', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getDataBarangkeluarHeader($id_barangkeluar)
    {
        $this->db->select('*');
        $this->db->from('barangkeluar');
        $this->db->where('id_barangkeluar', $id_barangkeluar);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getDataBarangkeluarHeaderKd($kd_transaksi)
    {
        $this->db->select('*');
        $this->db->from('barangkeluar');
        $this->db->where('kd_transaksi', $kd_transaksi);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function storeBarangkeluar($data)
    {
        $query = $this->db->insert('barangkeluar', $data);
        return $query;
    }


    public function updateBarangkeluar($id_barangkeluar, $data)
    {
        $this->db->where(array('id_barangkeluar' => $id_barangkeluar));
        $res = $this->db->update('barangkeluar', $data);
        return $res;
    }

    public function deleteBarangkeluar($where)
    {
        $this->db->where($where);
        $res = $this->db->delete("barangkeluar");
        return $res;
    }
    public function deletebarangkeluardetail($where)
    {
        $this->db->where($where);
        $res = $this->db->delete("barangkeluar_detail");
        return $res;
    }

    public function getDatabarangkeluarDetail($kd_transaksi)
    {
        $this->db->select('*');
        $this->db->from('barangkeluar_detail');
        $this->db->where('kd_transaksi', $kd_transaksi);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function Modelstorebarangkeluardetail($data)
    {
        $query = $this->db->insert('barangkeluar_detail', $data);
        return $query;
    }
}
