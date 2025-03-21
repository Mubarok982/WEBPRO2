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
    
        // Ambil data hewan & email pemilik
        $hewan = $this->db->get_where('hewan', ['id' => $data['hewan_id']])->row_array();
        $email_pemilik = $hewan['email_pemilik']; // Pastikan kolom ini ada di tabel
    
        // Load library email
        $this->load->library('email');
    
        // Konfigurasi email
        $this->email->from('no-reply@adopt.com', 'Adopt System');
        $this->email->to($email_pemilik); 
        $this->email->subject('Permohonan Adopsi Baru');
        
        $message = "
            <h3>Permohonan Adopsi Baru</h3>
            <p><strong>Nama Pemohon:</strong> {$data['nama_pemohon']}</p>
            <p><strong>Kontak:</strong> {$data['kontak']}</p>
            <p><strong>Alasan:</strong> {$data['alasan']}</p>
            <p><strong>Hewan yang Diajukan:</strong> {$hewan['nama']}</p>
        ";
    
        $this->email->message($message);
    
        if ($this->email->send()) {
            echo "<script>alert('Permohonan adopsi berhasil dikirim!'); window.location='".site_url('hewan')."';</script>";
        } else {
            echo "<script>alert('Gagal mengirim email notifikasi'); window.location='".site_url('hewan')."';</script>";
        }
    }

    public function detail($id)
{
    $data['hewan'] = $this->Hewan_model->get_hewan_by_id($id);
    
    if ($data['hewan']) {
        $data['adopter_id'] = $data['hewan']->adopter_id;
    } else {
        $data['adopter_id'] = null;
    }

    $this->load->view('hewan/detail', $data);
}

}
