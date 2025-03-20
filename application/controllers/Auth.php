<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
    }

    public function index()
    {
        // Cek apakah sudah login
        if ($this->session->userdata('user_id')) {
            redirect('dashboard');
        }
        $this->load->view('login');
    }

    public function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // Cek apakah email ada di database
        $user = $this->db->get_where('users', ['email' => $email])->row();

        if ($user) {
            // Verifikasi password
            if (password_verify($password, $user->password)) {
                // Set session
                $this->session->set_userdata('user_id', $user->id);
                $this->session->set_userdata('user_name', $user->name);

                // Redirect ke halaman hewan setelah login berhasil
                redirect('hewan');
            } else {
                // Jika password salah
                $this->session->set_flashdata('error', 'Password salah!');
                redirect('auth');
            }
        } else {
            // Jika email tidak ditemukan
            $this->session->set_flashdata('error', 'Email tidak terdaftar!');
            redirect('auth');
        }
    }





    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login'); // Setelah logout, kembali ke halaman login
    }


    public function register()
    {
        $this->load->view('auth/register');
    }

    public function store_user()
    {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $confirm_password = $this->input->post('confirm_password');

        // Validasi Password
        if ($password !== $confirm_password) {
            $this->session->set_flashdata('error', 'Password dan konfirmasi password harus sama!');
            redirect('auth/register');
        }

        // Cek apakah email sudah digunakan
        $existing_user = $this->db->get_where('users', ['email' => $email])->row();
        if ($existing_user) {
            $this->session->set_flashdata('error', 'Email sudah terdaftar, silakan login.');
            redirect('auth/register');
        }

        // Simpan ke database
        $this->User_model->register($name, $email, $password);
        $this->session->set_flashdata('success', 'Pendaftaran berhasil, silakan login.');

        // Arahkan ke halaman login setelah register berhasil
        redirect('auth/login');
    }


}
