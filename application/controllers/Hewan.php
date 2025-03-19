<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hewan extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model("Hewan_model");
        $this->load->helper(['url', 'form']);
        $this->load->library('upload');
    }

    public function index() {
        $data['hewan'] = $this->Hewan_model->get_all();
        $this->load->view('hewan/index', $data);
    }

    public function tambah() {
        $this->load->view('hewan/tambah');
    }

    public function simpan(){
        // Konfigurasi upload
        $config['upload_path']   = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size']      = 2048; // 2MB

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('gambar')) {
            echo "Upload gagal! " . $this->upload->display_errors();
            return;
        } else {
            $upload_data = $this->upload->data();
            $gambar = $upload_data['file_name'];

            $data = [
                'nama' => $this->input->post('nama'),
                'jenis' => $this->input->post('jenis'),
                'usia' => $this->input->post('usia'),
                'deskripsi' => $this->input->post('deskripsi'),
                'gambar' => $gambar,
                'status' => 'Tersedia',
            ];

            $this->Hewan_model->insert($data);
            redirect('hewan');
        }
    }

    public function edit($id) {
        $data['hewan'] = $this->Hewan_model->get_by_id($id);
        $this->load->view('hewan/edit', $data);
    }

    public function update(){
        $id = $this->input->post('id');

        // Cek apakah ada gambar baru yang diunggah
        if (!empty($_FILES['gambar']['name'])) {
            // Konfigurasi upload
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size']      = 2048; // 2MB

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('gambar')) {
                echo "Upload gagal! " . $this->upload->display_errors();
                return;
            } else {
                $upload_data = $this->upload->data();
                $gambar = $upload_data['file_name'];
            }
        } else {
            // Jika tidak ada gambar baru, gunakan gambar lama
            $gambar = $this->input->post('gambar_lama');
        }

        $data = [
            'nama' => $this->input->post('nama'),
            'jenis' => $this->input->post('jenis'),
            'usia' => $this->input->post('usia'),
            'deskripsi' => $this->input->post('deskripsi'),
            'gambar' => $gambar,
            'status' => 'Tersedia',
        ];

        $this->Hewan_model->update($id, $data);
        redirect('hewan');
    }

    public function hapus($id){
        $this->Hewan_model->delete($id);
        redirect('hewan');
    }

    public function detail($id) {
        $data['hewan'] = $this->Hewan_model->get_by_id($id);
        if (!$data['hewan']) {
            show_404();
        }
        $this->load->view('hewan/detail', $data);
    }
    
}
