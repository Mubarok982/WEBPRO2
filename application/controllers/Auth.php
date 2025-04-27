<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model'); // Pastikan sudah memiliki model User_model
        $this->load->library('session');
    }

    public function index()
    {
        // Cek apakah sudah login
        if ($this->session->userdata('user_id')) {
            redirect('dashboard'); // Redirect ke dashboard jika sudah login
        }
        $this->load->view('login'); // Tampilkan halaman login
    }

    public function login()
    {
        $username = $this->input->post('username'); // Gunakan username, bukan email
        $password = $this->input->post('password');

        // Cek apakah username ada di database
        $user = $this->db->get_where('user', ['username' => $username])->row();

        if ($user) {
            // Verifikasi password
            if (password_verify($password, $user->password)) {
                // Set session
                $this->session->set_userdata('user_id', $user->id_user); // Pastikan id_user yang digunakan
                $this->session->set_userdata('user_name', $user->username); // Set username di session

                // Redirect ke halaman dashboard setelah login berhasil
                redirect('dashboard');
            } else {
                // Jika password salah
                $this->session->set_flashdata('error', 'Password salah!');
                redirect('auth');
            }
        } else {
            // Jika username tidak ditemukan
            $this->session->set_flashdata('error', 'Username tidak terdaftar!');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth'); // Setelah logout, kembali ke halaman login
    }

    public function register()
    {
        $this->load->view('auth/register'); // Tampilkan halaman register
    }

    public function store_user()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $confirm_password = $this->input->post('confirm_password');

        // Validasi Password
        if ($password !== $confirm_password) {
            $this->session->set_flashdata('error', 'Password dan konfirmasi password harus sama!');
            redirect('auth/register');
        }

        // Cek apakah username sudah digunakan
        $existing_user = $this->db->get_where('user', ['username' => $username])->row();
        if ($existing_user) {
            $this->session->set_flashdata('error', 'Username sudah terdaftar, silakan login.');
            redirect('auth/register');
        }

        // Enkripsi password sebelum disimpan
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Simpan ke database
        $this->User_model->register($username, $hashed_password);
        $this->session->set_flashdata('success', 'Pendaftaran berhasil, silakan login.');

        // Arahkan ke halaman login setelah register berhasil
        redirect('auth');
    }
}
