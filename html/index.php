<?php
require '../vendor/autoload.php';
require '../src/config.php';

$config = array(
    'templates.path' => '../templates',
    'view' => new \Slim\Views\Twig()
);

$app = new \Slim\Slim($config);

$app->container->singleton('db', function () {
    return new \PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
});

new \Loyalty\Controller\Accounting($app);
new \Loyalty\Controller\Customers($app);
new \Loyalty\Controller\Freebies($app);

$app->run();
