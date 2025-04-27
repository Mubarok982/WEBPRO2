<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->library('session');

        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }

        $this->load->model('Dosen_model');
        $this->load->model('Matkul_model');
        $this->load->model('Mahasiswa_model');
        $this->load->model('Kelas_model');
    }

    public function index()
    {
        $this->load->view('Dashboard/dashboard'); // Halaman utama dashboard kosong / sambutan
    }

    public function dosen()
    {
        $data['dosen'] = $this->Dosen_model->get_all_dosen();
        $this->load->view('Dosen/dosen', $data);
    }

    public function matkul()
    {
        $data['matkul'] = $this->Matkul_model->get_all_matkul();
        $this->load->view('Matkul/matkul', $data);
    }

    public function mahasiswa()
    {
        $data['mahasiswa'] = $this->Mahasiswa_model->get_all_mahasiswa();
        $this->load->view('Matkul/mahasiswa', $data);
    }

    public function kelas()
    {
        $data['kelas'] = $this->Kelas_model->get_all_kelas();
        $this->load->view('Kelas/kelas', $data);
    }
}
