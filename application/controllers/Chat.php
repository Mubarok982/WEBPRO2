<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Chat_model');
        $this->load->helper('url');
    }

    public function send() 
    {
        $hewan_id = $this->input->post('hewan_id');
        $sender = $this->input->post('sender');
        $receiver = $this->input->post('receiver');
        $message = trim($this->input->post('message')); // Trim untuk hapus spasi kosong di awal/akhir

        // Validasi input
        if (empty($hewan_id) || empty($sender) || empty($receiver) || empty($message)) {
            echo json_encode(['status' => 'error', 'message' => 'Data tidak boleh kosong!']);
            return;
        }

        $data = [
            'hewan_id'    => $hewan_id,
            'sender'      => $sender,
            'receiver'    => $receiver,
            'message'     => $message,
            'read_status' => 'unread',
            'created_at'  => date('Y-m-d H:i:s')
        ];

        $insert = $this->db->insert('chat', $data);
        if ($insert) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal menyimpan pesan']);
        }
    }

    public function get_messages($hewan_id = null, $user_id = null)
    {
        if (!$hewan_id || !$user_id) {
            echo json_encode(['status' => 'error', 'message' => 'Parameter tidak valid!']);
            return;
        }

        $messages = $this->Chat_model->get_chat_by_hewan($hewan_id, $user_id);

        if ($messages) {
            echo json_encode($messages);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Tidak ada pesan']);
        }
    }

    public function mark_as_read()
    {
        $chat_id = $this->input->post('chat_id');

        if (!$chat_id) {
            echo json_encode(['status' => 'error', 'message' => 'Chat ID tidak valid!']);
            return;
        }

        $update = $this->Chat_model->update_read_status($chat_id);
        if ($update) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal memperbarui status pesan']);
        }
    }

    public function index()
    {
        $data['chats'] = $this->Chat_model->get_all_messages();
        $this->load->view('chat', $data);
    }
}
