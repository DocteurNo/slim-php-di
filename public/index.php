<?php
defined('WEBROOT') or define('WEBROOT', dirname(__DIR__));

require WEBROOT . '/vendor/autoload.php';

require WEBROOT . '/bootstrap/bootstrap.php';

require WEBROOT . '/app/routes.php';

$app->run();