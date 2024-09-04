<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelBarangMasuk extends CI_Model
{

    public function CreateCode()
    {
        $this->db->select('RIGHT(barangmasuk.kd_transaksi,5) as kd_transaksi', FALSE);
        $this->db->order_by('kd_transaksi', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('barangmasuk');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kd_transaksi) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $tanggal = date("Y");
        $kodetampil = "IN-" . $tanggal . "-" . $batas;
        return $kodetampil;
    }
    public function getDataBarangMasuk()
    {
        $this->db->select('*');
        $this->db->from('barangmasuk');
        $this->db->order_by('id_barangmasuk', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getDataBarangMasukHeader($id_barangmasuk)
    {
        $this->db->select('*');
        $this->db->from('barangmasuk');
        $this->db->where('id_barangmasuk', $id_barangmasuk);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getDataBarangMasukHeaderKd($kd_transaksi)
    {
        $this->db->select('*');
        $this->db->from('barangmasuk');
        $this->db->where('kd_transaksi', $kd_transaksi);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function storeBarangMasuk($data)
    {
        $query = $this->db->insert('barangmasuk', $data);
        return $query;
    }


    public function updateBarangmasuk($id_barangmasuk, $data)
    {
        $this->db->where(array('id_barangmasuk' => $id_barangmasuk));
        $res = $this->db->update('barangmasuk', $data);
        return $res;
    }

    public function deleteBarangmasuk($where)
    {
        $this->db->where($where);
        $res = $this->db->delete("barangmasuk");
        return $res;
    }
    public function deletebarangmasukdetail($where)
    {
        $this->db->where($where);
        $res = $this->db->delete("barangmasuk_detail");
        return $res;
    }

    public function getDatabarangmasukDetail($kd_transaksi)
    {
        $this->db->select('*');
        $this->db->from('barangmasuk_detail');
        $this->db->where('kd_transaksi', $kd_transaksi);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function Modelstorebarangmasukdetail($data)
    {
        $query = $this->db->insert('barangmasuk_detail', $data);
        return $query;
    }
}
