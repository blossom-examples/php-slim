<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

// Create App
$app = AppFactory::create();

// Add Error Middleware
$app->addErrorMiddleware(true, true, true);

// Add routes
$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write(file_get_contents(__DIR__ . '/index.html'));
    return $response->withHeader('Content-Type', 'text/html');
});

$app->get('/hello', function (Request $request, Response $response) {
    $name = $request->getQueryParams()['name'] ?? 'World';
    $data = [
        'message' => "Hello, $name!",
        'timestamp' => (new DateTime())->format(DateTime::ISO8601)
    ];

    $response->getBody()->write(json_encode($data));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->post('/echo', function (Request $request, Response $response) {
    $data = json_decode($request->getBody(), true);
    $responseData = [
        'message' => 'Echo response',
        'received' => $data,
        'timestamp' => (new DateTime())->format(DateTime::ISO8601)
    ];

    $response->getBody()->write(json_encode($responseData));
    return $response->withHeader('Content-Type', 'application/json');
});

// Run app
$app->run();