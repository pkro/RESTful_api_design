<?php
require __DIR__ . '/../vendor/autoload.php';
require('../src/bootstrap.php');

use Chatter\Models\Message;
use Chatter\Middleware\Logging as ChatterLogging;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app = AppFactory::create();
$app->setBasePath('/slimcourse');
$app->add(new ChatterLogging());

$app->get('/messages', function (Request $request, Response $response, $args) {
  $_message = new Message();
  $messages = $_message->all();
  $payload = [];
  foreach ($messages as $_msg) {
    $payload[$_msg->id] = ['body' => $_msg->body, 'user_id' => $_msg->user_id, 'created_at' => $_msg->created_at];
  }
  $payload = json_encode($payload);
  $response = $response->withStatus(200);
  $response = $response->withHeader('Content-Type', 'application/json');
  $response->getBody()->write($payload);
  return $response;
});


$app->run();
