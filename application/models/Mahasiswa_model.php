<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{
    public function get_all_mahasiswa()
    {
        return $this->db->get('mahasiswa')->result();
    }

    
    public function insert_mahasiswa($data)
    {
        $this->db->insert('mahasiswa', $data);
    }

    public function get_mahasiswa_by_id($id)
    {
        return $this->db->get_where('mahasiswa', ['id_mahasiswa' => $id])->row();
    }

    public function update_mahasiswa($id, $data)
    {
        $this->db->where('id_mahasiswa', $id);
        $this->db->update('mahasiswa', $data);
    }

    public function delete_mahasiswa($id)
    {
        $this->db->where('id_mahasiswa', $id);
        $this->db->delete('mahasiswa');
    }
}
