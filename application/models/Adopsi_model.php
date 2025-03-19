<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adopsi_model extends CI_Model {
    public function insert($data) {
        $this->db->insert('adopsi', $data);
    }
}
