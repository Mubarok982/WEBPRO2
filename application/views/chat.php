<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Adopsi</title>
</head>
<body>
    <h2>Chat Adopsi</h2>
    <div id="chat-box"></div>
    <input type="text" id="message" placeholder="Tulis pesan...">
    <button onclick="sendMessage()">Kirim</button>

    <script>
        var conn = new WebSocket('ws://localhost:8080');
        conn.onmessage = function(e) {
            document.getElementById("chat-box").innerHTML += "<p>" + e.data + "</p>";
        };

        function sendMessage() {
            var msg = document.getElementById("message").value;
            conn.send(msg);
            document.getElementById("message").value = '';
        }
    </script>
</body>
</html>
