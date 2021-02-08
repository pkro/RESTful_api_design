<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();
$app->setBasePath('/slimcourse');

$app->get('/', function (Request $request, Response $response, $args) {
  $response->getBody()->write("Hello world!");
  return $response;
});
$app->get('/hello/{name}', function (Request $request, Response $response, $args) {
  ['name' => $name] = $args;
  $response->getBody()->write("Hey {$name}");
  return $response;
});

$app->run();
