<?php
require '../vendor/autoload.php';

$config = array(
    'templates.path' => '../templates',
    'view' => new \Slim\Views\Twig()
);

$app = new \Slim\Slim($config);

new \Loyalty\Home($app);

$app->run();
