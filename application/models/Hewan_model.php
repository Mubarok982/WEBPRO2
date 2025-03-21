<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class Hewan_model extends CI_Model {
    public function get_all(){
        return $this->db->get('hewan')->result_array();
    }

    public function get_by_id($id) {
        $query = $this->db->get_where('hewan');
        return $query->row_array();
    }

    public function insert($data) {
        return $this->db->insert('hewan', $data);
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('hewan', $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('hewan');
    }

    public function tambahHewan($data)
{
    return $this->db->insert('hewan', $data);
}

public function get_email_pemilik($id_hewan) {
    $this->db->select('email_pemilik');
    $this->db->where('id', $id_hewan);
    return $this->db->get('hewan')->row_array();
}



    public function getById($id)
    {
        return $this->db->get_where('hewan', ['id' => $id])->row();
    }



}