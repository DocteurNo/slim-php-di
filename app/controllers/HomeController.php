<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;

class HomeController extends Controller
{
    public function hello(Response $response, ?string $name = null) {
        if (is_null($name)) {
            $name = 'World!';
        }
        return $this->container->get('view')->render($response, 'home.twig', compact('name'));
    }
}