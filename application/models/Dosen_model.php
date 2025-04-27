<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen_model extends CI_Model
{
    public function get_all_dosen()
    {
        return $this->db->get('dosen')->result();
    }

    
    // Menambahkan data dosen
    public function insert_dosen($data)
    {
        $this->db->insert('dosen', $data);
    }

    // Mendapatkan data dosen berdasarkan ID
    public function get_dosen_by_id($id)
    {
        return $this->db->get_where('dosen', ['id_dosen' => $id])->row();
    }

    // Mengupdate data dosen
    public function update_dosen($id, $data)
    {
        $this->db->where('id_dosen', $id);
        $this->db->update('dosen', $data);
    }

    // Menghapus data dosen
    public function delete_dosen($id)
    {
        $this->db->where('id_dosen', $id);
        $this->db->delete('dosen');
    }
}
