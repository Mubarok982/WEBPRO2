<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function register($username, $password)
    {
        $data = [
            'username' => $username,
            'password' => $password,
            'role' => 'mahasiswa' 
        ];

        // Insert data user ke tabel 'user'
        return $this->db->insert('user', $data);
    }
}
