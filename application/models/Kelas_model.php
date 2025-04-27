<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas_model extends CI_Model
{
    public function get_all_kelas()
    {
        return $this->db->get('kelas')->result();
    }

public function insert_kelas($data)
{
    $this->db->insert('kelas', $data);
}

public function get_kelas_by_id($id)
{
    return $this->db->get_where('kelas', ['id_kelas' => $id])->row();
}

public function update_kelas($id, $data)
{
    $this->db->where('id_kelas', $id);
    $this->db->update('kelas', $data);
}

public function delete_kelas($id)
{
    $this->db->where('id_kelas', $id);
    $this->db->delete('kelas');
}
}

