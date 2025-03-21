<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container mt-4">
        <h2>Chat Adopsi Hewan</h2>
        <div class="card">
            <div class="card-body">
                <div id="chat-box" style="height: 300px; overflow-y: scroll; border: 1px solid #ddd; padding: 10px;">
                    <!-- Chat akan dimuat di sini -->
                </div>
            </div>
        </div>

        <form id="chat-form" class="mt-3">
            <input type="hidden" id="hewan_id" value="<?= $hewan_id; ?>">
            <input type="hidden" id="sender" value="<?= $this->session->userdata('user_id'); ?>"> 
            <input type="hidden" id="receiver" value="<?= $receiver_id; ?>"> 

            <div class="input-group">
                <input type="text" id="message" class="form-control" placeholder="Tulis pesan..." required>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            function loadChat() {
                let hewan_id = $("#hewan_id").val();
                $.get("<?= site_url('chat/get_chat/'); ?>" + hewan_id, function(data) {
                    try {
                        let chats = JSON.parse(data);
                        let chatHtml = "";
                        if (chats.length === 0) {
                            chatHtml = "<p class='text-muted'>Belum ada pesan.</p>";
                        } else {
                            chats.forEach(chat => {
                                chatHtml += `<p><strong>${chat.sender}:</strong> ${chat.message} <small>(${chat.timestamp})</small></p>`;
                            });
                        }
                        $("#chat-box").html(chatHtml);
                        $("#chat-box").scrollTop($("#chat-box")[0].scrollHeight);
                    } catch (error) {
                        console.error("Error parsing chat data:", error);
                    }
                });
            }

            loadChat(); // Load chat pertama kali
            setInterval(loadChat, 3000); // Refresh chat setiap 3 detik

            $("#chat-form").submit(function(e) {
                e.preventDefault();
                let formData = {
                    hewan_id: $("#hewan_id").val(),
                    sender: $("#sender").val(),
                    receiver: $("#receiver").val(),
                    message: $("#message").val()
                };

                $.post("<?= site_url('chat/send_message'); ?>", formData, function(response) {
                    $("#message").val(""); // Kosongkan input setelah mengirim
                    loadChat(); // Muat ulang chat
                });
            });
        });
    </script>
</body>
</html>
