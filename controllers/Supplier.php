<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata("logged") <> 1) {
            redirect(site_url('login'));
        }

        //load model
        $this->load->model('ModelSupplier', 'msp');
    }

    //menampilkan data supplier
    public function index()
    {

        $data = array(
            'title' => 'Data supplier',
            'active_menu_master' => 'menu-open',
            'active_menu_mst' => 'active',
            'active_menu_supplier' => 'active',
            'supplier' => $this->msp->getDatasupplier(),
            'kd_supplier' => $this->msp->CreateCodeSupplier()
        );

        $this->load->view('layouts/header', $data);
        $this->load->view('master/v_supplier', $data);
        $this->load->view('layouts/footer');
    }


    // public function tambahsupplier()
    // {
    //     $data = array(
    //         'title' => 'Data supplier',
    //         'active_menu_master' => 'menu-open',
    //         'active_menu_mst' => 'active',
    //         'active_menu_brg' => 'active',
    //         'satuan' => $this->msp->getDataSatuan(),
    //         'jb' => $this->mjb->getKategorisupplier(),
    //         'kd_supplier' => $this->mb->CreateCode()
    //     );

    //     $this->load->view('layouts/header', $data);
    //     $this->load->view('master/c_supplier', $data);
    //     $this->load->view('layouts/footer');
    // }

    public function storeSupplier()
    {
        $data = $this->input->post(null, true);
        $result = $this->msp->storesupplier($data);

        if ($result >= 1) {
            $this->session->set_flashdata('sukses', 'Disimpan');
            redirect('supplier');
        } else {
            $this->session->set_flashdata('gagal', 'Disimpan');
            redirect('supplier/tambah');
        }
    }

    public function updateSupplier()
    {
        $id_supplier = $this->input->post('id_supplier');
        $data = $this->input->post(null, true);
        unset($data['id_supplier']);
        $result = $this->msp->updatesupplier($id_supplier, $data);
        if ($result >= 1) {
            $this->session->set_flashdata('sukses', 'Diubah');
            redirect('supplier');
        } else {
            $this->session->set_flashdata('gagal', 'Diubah');
            redirect('supplier/edit/' . $id_supplier);
        }
    }

    public function DeleteSupplier($id_supplier)
    {
        $id_supplier = $this->uri->segment(3);
        $where = array('id_supplier' => $id_supplier);
        $res = $this->msp->deletesupplier($where);
        if ($res >= 1) {
            $this->session->set_flashdata('sukses', 'Dihapus');
            redirect('supplier');
        } else {
            $this->session->set_flashdata('gagal', 'Dihapus');
            redirect('supplier');
        }
    }
}

/* End of file supplier.php */
/* Location: ./application/controllers/supplier.php */