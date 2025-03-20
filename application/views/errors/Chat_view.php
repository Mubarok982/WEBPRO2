<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
    <div class="container mt-5 chat-container">
        <div class="row">
            <div class="col-md-4 chat-list">
                <div class="search-bar p-2">
                    <input type="text" class="form-control" placeholder="Search...">
                </div>
                <ul class="list-group chat-users">
                    <li class="list-group-item active">User 1</li>
                    <li class="list-group-item">User 2</li>
                </ul>
            </div>
            <div class="col-md-8 chat-box">
                <div class="chat-header p-3 bg-primary text-white">
                    <h5>User 1</h5>
                </div>
                <div class="chat-body p-3" id="chat-messages">
                    <div class="message sent">Hello!</div>
                    <div class="message received">Hi there!</div>
                </div>
                <div class="chat-footer p-3">
                    <input type="text" id="chat-input" class="form-control" placeholder="Type your message...">
                    <button class="btn btn-primary mt-2" id="send-message">Send</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url('assets/js/script.js') ?>"></script>
</body>
</html>
