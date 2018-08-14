<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\Twig;

// Simple response
$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write("<h1>Hello World!</h1>");
    return $response;
});

// Simple route with Twig
$app->get('/welcome', function (Request $request, Response $response, Twig $twig) {
    return $twig->render($response, 'welcome.twig');
});

// Route with HomeController (/hello ou /hello/yourname)
$app->get('/hello[/{name}]', [App\Controllers\HomeController::class, 'hello']);
