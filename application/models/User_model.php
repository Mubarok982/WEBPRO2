<?php
class User_model extends CI_Model {
    public function check_user($email, $password) {
        $this->db->where('email', $email);
        $user = $this->db->get('users')->row();

        if ($user && password_verify($password, $user->password)) {
            return $user;
        }
        return false;
    }

    public function register($name, $email, $password) {
        $data = [
            'name' => $name,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];
        return $this->db->insert('users', $data);
    }
    
}

