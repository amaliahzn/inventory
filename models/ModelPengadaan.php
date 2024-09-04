<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelPengadaan extends CI_Model
{

    public function CreateCode()
    {
        $this->db->select('RIGHT(pengadaan.kd_pengadaan,7) as kd_pengadaan', FALSE);
        $this->db->order_by('kd_pengadaan', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('pengadaan');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kd_pengadaan) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $date = date("Y");
        $kodetampil = "PA-" . $batas . "-" . $date;
        return $kodetampil;
    }
    public function getDatapengadaan()
    {
        $this->db->select('*');
        $this->db->from('pengadaan');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getDatapengadaanHeader($id)
    {
        $this->db->select('*');
        $this->db->from('pengadaan');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getDatapengadaanHeaderKd($kd_pengadaan)
    {
        $this->db->select('*');
        $this->db->from('pengadaan');
        $this->db->where('kd_pengadaan', $kd_pengadaan);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function storepengadaan($data)
    {
        $query = $this->db->insert('pengadaan', $data);
        return $query;
    }


    public function updatepengadaan($id, $data)
    {
        $this->db->where(array('id' => $id));
        $res = $this->db->update('pengadaan', $data);
        return $res;
    }

    public function deletepengadaan($where)
    {
        $this->db->where($where);
        $res = $this->db->delete("pengadaan");
        return $res;
    }
    public function deletepengadaandetail($where)
    {
        $this->db->where($where);
        $res = $this->db->delete("pengadaan_detail");
        return $res;
    }

    public function getDatapengadaanDetail($kd_pengadaan)
    {
        $this->db->select('*');
        $this->db->from('pengadaan_detail');
        $this->db->where('kd_pengadaan', $kd_pengadaan);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function Modelstorepengadaandetail($data)
    {
        $query = $this->db->insert('pengadaan_detail', $data);
        return $query;
    }
}
