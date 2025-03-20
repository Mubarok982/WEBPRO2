<?php
require 'vendor/autoload.php';
require 'application/libraries/WebsocketServer.php';

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new WebsocketServer()
        )
    ),
    8080
);

echo "WebSocket server running on port 8080...\n";
$server->run();
