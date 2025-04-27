<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Matkul extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Matkul_model');
        $this->load->library('session');
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['matkul'] = $this->Matkul_model->get_all_matkul();
        $this->load->view('Matkul/matkul', $data);
    }

    
    public function tambah()
    {
        $this->load->view('Navbar/navbar');
        $this->load->view('Matkul/Tambah_matkul');
    }

    public function tambah_aksi()
    {
        $data = [
            'nama_matkul' => $this->input->post('nama_matkul'),
            'kode_matkul' => $this->input->post('kode_matkul')
        ];

        $this->Matkul_model->insert_matkul($data);
        redirect('matkul');
    }

    public function edit($id)
    {
        $data['matkul'] = $this->Matkul_model->get_matkul_by_id($id);
        $this->load->view('Navbar/navbar');
        $this->load->view('Matkul/edit_matkul', $data);
    }

    public function edit_aksi()
    {
        $id = $this->input->post('id');
        $data = [
            'nama_matkul' => $this->input->post('nama_matkul'),
            'kode_matkul' => $this->input->post('kode_matkul')
        ];

        $this->Matkul_model->update_matkul($id, $data);
        redirect('matkul');
    }

    public function hapus($id)
    {
        $this->Matkul_model->delete_matkul($id);
        redirect('matkul');
    }
}
