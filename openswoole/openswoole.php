<?php
$server = new OpenSwoole\HTTP\Server("127.0.0.1", 5000);

$server->on("start", function (OpenSwoole\Http\Server $server) {
    echo "OpenSwoole http server is started at http://127.0.0.1:5000\n";
});

$server->on("request", function (OpenSwoole\Http\Request $request, OpenSwoole\Http\Response $response) {
    $response->header("Content-Type", "text/plain");
    $response->end("Hello World\n");
});

$server->on('connect', function($request, $response) {
    echo date('Y-m-d'). " - listen on " . json_encode($request);
});

$server->start();