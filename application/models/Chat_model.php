<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chat_model extends CI_Model {

    
    public function __construct() {
        parent::__construct();
        $this->load->database(); 
    }

    public function insert_message($data)
    {
        return $this->db->insert('chat', $data);
    }

    public function get_chat_by_hewan($hewan_id, $user_id)
    {
        $this->db->where('hewan_id', $hewan_id);
        $this->db->where("(sender = $user_id OR receiver = $user_id)");
        $this->db->order_by('timestamp', 'ASC');
        return $this->db->get('chat')->result();
    }

    public function update_read_status($chat_id)
    {
        $this->db->set('read_status', 'read');
        $this->db->where('id', $chat_id);
        return $this->db->update('chat');
    }

    public function get_all_messages() {
        return $this->db->order_by('id', 'ASC')->get('chat')->result();
    }

    public function send_message($data) {
        return $this->db->insert('chat', $data);
    }

}
