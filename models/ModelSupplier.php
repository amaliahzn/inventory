<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelSupplier extends CI_Model
{

    public function CreateCodeSupplier()
    {
        $this->db->select('RIGHT(supplier.kd_supplier,5) as kd_supplier', FALSE);
        $this->db->order_by('kd_supplier', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('supplier');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kd_supplier) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $kodetampil = "SPL" . $batas;
        return $kodetampil;
    }

    public function getDatasupplier()
    {
        $this->db->select('*');
        $this->db->from('supplier');
        $this->db->order_by('id_supplier', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getDetailsupplier($id_supplier)
    {
        $this->db->select('*');
        $this->db->from('supplier');
        $this->db->where('id_supplier', $id_supplier);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function storesupplier($data)
    {
        $query = $this->db->insert('supplier', $data);
        return $query;
    }

    public function updatesupplier($id_supplier, $data)
    {
        $this->db->where(array('id_supplier' => $id_supplier));
        $res = $this->db->update('supplier', $data);
        return $res;
    }

    public function deletesupplier($where)
    {
        $this->db->where($where);
        $res = $this->db->delete("supplier");
        return $res;
    }
}

/* End of file Modelsupplier.php */
/* Location: ./application/models/Modelsupplier.php */