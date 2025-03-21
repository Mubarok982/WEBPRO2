<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat_model extends CI_Model {

    // Simpan pesan ke database
    public function insert_message($data) {
        return $this->db->insert('chat', $data);
    }

    // Ambil semua pesan berdasarkan hewan_id
    public function get_messages($hewan_id) {
        $this->db->where('hewan_id', $hewan_id);
        $this->db->order_by('timestamp', 'ASC');
        return $this->db->get('chat')->result();
    }

    public function get_user_by_email($email_pemilik) {
        $this->db->where('email_pemilik', $email_pemilik);
        $query = $this->db->get('hewan'); // Ambil dari tabel hewan
        return $query->row(); // Mengembalikan satu baris data
    }
}
