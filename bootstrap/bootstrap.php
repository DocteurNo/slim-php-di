<?php

use DI\ContainerBuilder;

$app = new class() extends \DI\Bridge\Slim\App {
    protected function configureContainer(ContainerBuilder $builder)
    {
        $builder->addDefinitions(WEBROOT . '/config/settings.php');
    }
};
