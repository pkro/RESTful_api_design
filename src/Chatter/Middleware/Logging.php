<?php

namespace Chatter\Middleware;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Psr7\Response;

class Logging
{
  public function __invoke(Request $request, RequestHandler $handler): Response
  {
    error_log($request->getMethod() . " -- " . $request->getUri());
    return  $handler->handle($request);
  }
}
