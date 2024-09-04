<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelPeminjaman extends CI_Model
{

    public function CreateCode()
    {
        $this->db->select('RIGHT(peminjaman.kd_peminjaman,5) as kd_peminjaman', FALSE);
        $this->db->order_by('kd_peminjaman', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('peminjaman');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kd_peminjaman) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $kodetampil = "PMJ-" . $batas;
        return $kodetampil;
    }
    public function getDatapeminjaman()
    {
        $this->db->select('*');
        $this->db->from('peminjaman');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getDatapeminjamanHeader($id)
    {
        $this->db->select('*');
        $this->db->from('peminjaman');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getDatapeminjamanHeaderKd($kd_peminjaman)
    {
        $this->db->select('*');
        $this->db->from('peminjaman');
        $this->db->where('kd_peminjaman', $kd_peminjaman);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function storepeminjaman($data)
    {
        $query = $this->db->insert('peminjaman', $data);
        return $query;
    }


    public function updatepeminjaman($id, $data)
    {
        $this->db->where(array('id' => $id));
        $res = $this->db->update('peminjaman', $data);
        return $res;
    }

    public function deletepeminjaman($where)
    {
        $this->db->where($where);
        $res = $this->db->delete("peminjaman");
        return $res;
    }
    public function deletepeminjamandetail($where)
    {
        $this->db->where($where);
        $res = $this->db->delete("peminjaman_detail");
        return $res;
    }

    public function getDatapeminjamanDetail($kd_peminjaman)
    {
        $this->db->select('*');
        $this->db->from('peminjaman_detail');
        $this->db->where('kd_peminjaman', $kd_peminjaman);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function Modelstorepeminjamandetail($data)
    {
        $query = $this->db->insert('peminjaman_detail', $data);
        return $query;
    }
}
