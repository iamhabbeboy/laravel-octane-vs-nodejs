<?php
$http = new Swoole\Http\Server('127.0.0.1', 9501);

$http->on('start', function ($server) {
    echo "Swoole http server is started at http://127.0.0.1:9501\n";
});

$http->on('request', function ($request, $response) {
    $response->header('Content-Type', 'text/plain');
    $response->end('Hello World');
});

$http->on('connect', function($request, $response) {
    echo date('Y-m-d'). " - listen on " . json_encode($request);
});

$http->start();