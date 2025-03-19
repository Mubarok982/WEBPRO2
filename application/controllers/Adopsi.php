<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adopsi extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("Adopsi_model");
        $this->load->helper('url');
    }

    public function form($id) {
        $data['hewan'] = $this->db->get_where('hewan', ['id' => $id])->row_array();
        $this->load->view('adopsi/form', $data);
    }

    public function simpan() {
        $data = [
            'hewan_id' => $this->input->post('hewan_id'),  
            'nama_pemohon' => $this->input->post('nama_pemohon'),
            'kontak' => $this->input->post('kontak'),
            'alasan' => $this->input->post('alasan'),
            'status' => 'Pending'
        ];
        

        $this->Adopsi_model->insert($data);
        echo "<script>alert('Permohonan adopsi berhasil dikirim!'); window.location='".site_url('hewan')."';</script>";
    }
}
