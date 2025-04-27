<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dosen_model');
        $this->load->library('session');

        // Cek login
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['dosen'] = $this->Dosen_model->get_all_dosen();
        $this->load->view('Dosen/dosen', $data);
    }

    
    // Menambah dosen
    public function tambah()
    {
        $this->load->view('Navbar/navbar');  // Include navbar
        $this->load->view('Dosen/tambah_dosen');
    }

    public function tambah_aksi()
    {
        $data = [
            'nama_dosen' => $this->input->post('nama_dosen'),
            'nidn' => $this->input->post('nidn'),
            'email' => $this->input->post('email'),
            'no_telp' => $this->input->post('no_telp')
        ];

        $this->Dosen_model->insert_dosen($data);
        redirect('dosen');
    }

    // Edit dosen
    public function edit($id)
    {
        $data['dosen'] = $this->Dosen_model->get_dosen_by_id($id);
        $this->load->view('Navbar/navbar');
        $this->load->view('Dosen/edit_dosen', $data);
    }

    public function edit_aksi()
    {
        $id = $this->input->post('id');
        $data = [
            'nama_dosen' => $this->input->post('nama_dosen'),
            'nidn' => $this->input->post('nidn'),
            'email' => $this->input->post('email'),
            'no_telp' => $this->input->post('no_telp')
        ];

        $this->Dosen_model->update_dosen($id, $data);
        redirect('dosen');
    }

    // Hapus dosen
    public function hapus($id)
    {
        $this->Dosen_model->delete_dosen($id);
        redirect('dosen');
    }
}
