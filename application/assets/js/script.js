$(document).ready(function () {
    // Event saat tombol kirim diklik
    $("#send-message").click(function () {
        sendMessage();
    });

    // Event saat enter ditekan di input
    $("#chat-input").keypress(function (event) {
        if (event.which === 13) { // 13 = Enter key
            sendMessage();
        }
    });

    function sendMessage() {
        var message = $("#chat-input").val().trim();
        if (message !== "") {
            // Tambahkan pesan ke dalam chat box
            $("#chat-messages").append('<div class="message sent">' + message + '</div>');

            // Kosongkan input setelah mengirim pesan
            $("#chat-input").val("");

            // Kirim pesan ke server via AJAX
            $.ajax({
                url: "Chat/sendMessage", // Ubah sesuai dengan route di CodeIgniter
                method: "POST",
                data: { message: message },
                success: function (response) {
                    console.log("Pesan terkirim: " + response);
                },
                error: function (xhr, status, error) {
                    console.error("Error mengirim pesan:", error);
                }
            });
        }
    }
});
