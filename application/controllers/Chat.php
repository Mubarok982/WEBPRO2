<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Chat_model'); // Load model chat
    }

    // Mengirim pesan ke database
    public function send_message()
    {
        $data = [
            'hewan_id' => $this->input->post('hewan_id'),
            'sender' => $this->input->post('sender'),
            'receiver' => $this->input->post('receiver'),
            'message' => $this->input->post('message'),
            'read_status' => 'unread'
        ];
        $this->Chat_model->insert_message($data);
    }

    // Mengambil semua pesan berdasarkan hewan_id
    public function load_messages()
    {
        $hewan_id = $this->input->post('hewan_id');
        $user_id = $this->session->userdata('user_id'); // Ambil user yang sedang login
        $messages = $this->Chat_model->get_messages($hewan_id);

        foreach ($messages as $msg) {
            $class = ($msg->sender == $user_id) ? 'sent' : 'received';
            echo "<div class='chat-message $class'><strong>{$msg->message}</strong><br><small>{$msg->timestamp}</small></div>";
        }
    }



    public function start($encoded_email)
{
    $email_pemilik = base64_decode($encoded_email); // Decode email

    // Langsung redirect ke halaman chat
    redirect('chat/conversation/' . urlencode($encoded_email));
}

public function conversation($email_pemilik)
{
    // Debug: Cek email yang diterima
    echo "Email Pemilik: " . urldecode($email_pemilik) . "<br>";

    // Ambil data hewan berdasarkan email pemilik
    $hewan = $this->db->get_where('hewan', ['email_pemilik' => urldecode($email_pemilik)])->row();

    // Debug: Cek apakah data ditemukan
    if ($hewan) {
        echo "Hewan ditemukan: " . $hewan->id;
        redirect('chat/start/' . $hewan->id);
    } else {
        echo "Pemilik tidak ditemukan.";
    }
}

}

