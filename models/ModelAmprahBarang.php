<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelAmprahBarang extends CI_Model
{

    public function CreateCode()
    {
        $this->db->select('RIGHT(permintaan_header.kd_amprah,5) as kd_amprah', FALSE);
        $this->db->order_by('kd_amprah', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('permintaan_header');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kd_amprah) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $kodetampil = "TRX-AB" . $batas;
        return $kodetampil;
    }

    public function getDataAmprahBarangUser($nama_user)
    {
        $this->db->select('*');
        $this->db->from('permintaan');
        // $this->db->join('users b', 'b.nama_user = a.nama_user');
        // $this->db->join('lokasi_aset c', 'c.id_lokasi = a.id_lokasi');
        $this->db->where('nama', $nama_user);
        $this->db->where('status_kabag =', 0);
        $this->db->where('status_kasubag =', 0);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getDaftarDataAmprahBarangUser($nama_user)
    {
        // $this->db->distinct('');
        // $this->db->select('*');
        // $this->db->from('permintaan');
        // $this->db->where('nama', $nama_user);
        // $this->db->where('status_kasubag !=', 0);
        // $this->db->where('status_kabag !=', 0);

        // $query = $this->db->get();
        // return $query->result_array();
        $this->db->distinct('');
        $this->db->select('kd_amprah,ruang,tgl_permintaan,nama');
        $this->db->from('permintaan');
        $this->db->where('nama', $nama_user);
        $this->db->where('status_kasubag !=', 0);
        $this->db->where('status_kasubag !=', 2);
        $this->db->where('status_kabag !=', 0);
        $this->db->where('status_kabag !=', 2);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getDaftarDataAmprahBarangBelumAcc($nama_user)
    {

        $this->db->distinct('');
        $this->db->select('kd_amprah,ruang,tgl_permintaan,nama');
        $this->db->from('permintaan');
        $this->db->where('nama', $nama_user);
        // $this->db->where('status_kasubag =', 0);
        // $this->db->where('status_kasubag =', 2);
        // $this->db->where('status_kabag =', 0);
        $this->db->where('status_kabag !=', 1);
        $this->db->order_by('nama', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getDataUser($nama_user)
    {
        $this->db->select('*');
        $this->db->from('users');
        // $this->db->join('users b', 'b.nama_user = a.nama_user');
        // $this->db->join('lokasi_aset c', 'c.id_lokasi = a.id_lokasi');
        $this->db->where('nama_user', $nama_user);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getDataamprahbarang()
    {
        $this->db->select('*');
        $this->db->from('permintaan');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getDataamprahbarangHeader($id)
    {
        $this->db->select('*');
        $this->db->from('amprahbarang');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getDataamprahbarangHeaderKd($kd_amprah)
    {
        $this->db->select('*');
        $this->db->from('permintaan_header');
        $this->db->where('kd_amprah', $kd_amprah);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getDataDetailAmprah($kd_amprah)
    {
        $this->db->select('*');
        $this->db->from('permintaan');
        $this->db->where('kd_amprah', $kd_amprah);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function storeAmprahBarangHeader($data)
    {
        $query = $this->db->insert('permintaan_header', $data);
        return $query;
    }


    public function updateamprahbarang($id, $data)
    {
        $this->db->where(array('id' => $id));
        $res = $this->db->update('amprahbarang', $data);
        return $res;
    }

    public function deleteamprahbarang($where)
    {
        $this->db->where($where);
        $res = $this->db->delete("amprahbarang");
        return $res;
    }
    public function deleteamprahbarangdetail($where)
    {
        $this->db->where($where);
        $res = $this->db->delete("permintaan");
        return $res;
    }

    public function getDataamprahbarangDetail($kd_amprah)
    {
        $this->db->select('*');
        $this->db->from('amprahbarang_detail');
        $this->db->where('kd_amprah', $kd_amprah);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function storeamprahbarangdetail($data)
    {
        $query = $this->db->insert('permintaan', $data);
        return $query;
    }
}
