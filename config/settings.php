<?php

use Psr\Container\ContainerInterface;
use App\Controllers\HomeController;
use Slim\Views\Twig;

return [
    'settings.displayErrorDetails' => true,
    Twig::class => function (ContainerInterface $c) {
        $twig = new Twig(WEBROOT . '/templates', [
            'cache' => false
        ]);
        $router = $c->get('router');
        //$uri = $c->get('request')->getUri(); // Le uri de PHP-DI
        $uri = Slim\Http\Uri::createFromEnvironment(new Slim\Http\Environment($_SERVER)); // Le uri de Slim-Twig
        $twig->addExtension(new Slim\Views\TwigExtension($router, $uri));

        return $twig;
    },
    'view' => \DI\get(Twig::class),
    HomeController::class => function (ContainerInterface $c) {
        return new HomeController($c);
    }
];
