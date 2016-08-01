<?php

$loader = require __DIR__ . '/../vendor/autoload.php';

\Doctrine\Common\Annotations\AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

$config = require __DIR__ . '/../app/config.php';

$app = new \Silex\Application($config['common']);

require 'bootstrap.php';

$app->get('/', function () use ($app) {
   return $app->redirect($app['url_generator']->generate('loginAdmin'));
});

$app->mount('/', new \Yanna\bts\Http\Controller\AppController($app));

$app->run();