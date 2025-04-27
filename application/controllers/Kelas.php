<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kelas_model');
        $this->load->library('session');
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['kelas'] = $this->Kelas_model->get_all_kelas();
        $this->load->view('Kelas/kelas', $data);
    }

    
    public function tambah()
    {
        $this->load->view('Navbar/navbar');
        $this->load->view('Kelas/Tambah_kelas');
    }

    public function tambah_aksi()
    {
        $data = [
            'nama_kelas' => $this->input->post('nama_kelas'),
            'nama_ruangan' => $this->input->post('nama_ruangan')
        ];

        $this->Kelas_model->insert_kelas($data);
        redirect('kelas');
    }

    public function edit($id)
    {
        $data['kelas'] = $this->Kelas_model->get_kelas_by_id($id);
        $this->load->view('Navbar/navbar');
        $this->load->view('Kelas/Edit_kelas', $data);
    }

    public function edit_aksi()
    {
        $id = $this->input->post('id');
        $data = [
            'nama_kelas' => $this->input->post('nama_kelas'),
            'nama_ruangan' => $this->input->post('nama_ruangan')
        ];

        $this->Kelas_model->update_kelas($id, $data);
        redirect('kelas');
    }

    public function hapus($id)
    {
        $this->Kelas_model->delete_kelas($id);
        redirect('kelas');
    }
}
