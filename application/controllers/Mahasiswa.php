<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
        $this->load->library('session');
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['mahasiswa'] = $this->Mahasiswa_model->get_all_mahasiswa();
        $this->load->view('Mahasiswa/mahasiswa', $data);
    }

    
    public function tambah()
    {
        $this->load->view('Navbar/navbar');
        $this->load->view('Mahasiswa/tambah_mahasiswa');
    }

    public function tambah_aksi()
    {
        $data = [
            'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
            'nim' => $this->input->post('nim'),
            'email' => $this->input->post('email'),
            'no_telp' => $this->input->post('no_telp')
        ];

        $this->Mahasiswa_model->insert_mahasiswa($data);
        redirect('mahasiswa');
    }

    public function edit($id)
    {
        $data['mahasiswa'] = $this->Mahasiswa_model->get_mahasiswa_by_id($id);
        $this->load->view('Navbar/navbar');
        $this->load->view('Mahasiswa/Edit_mahasiswa', $data);
    }

    public function edit_aksi()
    {
        $id = $this->input->post('id');
        $data = [
            'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
            'nim' => $this->input->post('nim'),
            'email' => $this->input->post('email'),
            'no_telp' => $this->input->post('no_telp')
        ];

        $this->Mahasiswa_model->update_mahasiswa($id, $data);
        redirect('mahasiswa');
    }

    public function hapus($id)
    {
        $this->Mahasiswa_model->delete_mahasiswa($id);
        redirect('mahasiswa');
    }
}
