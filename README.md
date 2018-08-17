# Slim3 & PHP-DI

Mon premier projet avec Slim3 et [PHP-DI](http://php-di.org/)

J'ai pris pour base Slim-Bridge trouvé sur **http://php-di.org/doc/frameworks/slim.html**

## Pour commencer

Vous devez faire un composer install

Les versions installées :
- slim/slim => 3.10.0
- slim/twig-view => 2.4.0
- php-di/slim-bridge => 2.0.0

### Création d'un controller

```php
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
```

### Création de la route

```php
// Route with HomeController (/hello ou /hello/yourname)
$app->get('/hello[/{name}]', [App\Controllers\HomeController::class, 'hello']);
```

Le système de routes fonctionne comme normalement avec slim3

#### Ne pas oublier d'enregistrer le controller dans settings.php

```php
return [
    '''
    HomeController::class => function (ContainerInterface $c) {
        return new HomeController($c);
    }
];
```

### Conclusion

J'ajouterai sûrement Monolog, un ORM et plus si affinité
