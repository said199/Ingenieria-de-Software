<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Psr7\Response;
use Slim\Routing\RouteCollectorProxy;
use function DI\string;
include(__DIR__."/rutas_class.php");
$app->group('/usuario', function(RouteCollectorProxy $app){
      $app->post('',                       \usuario::class . ':usuarioPost');
      $app->get('',                     \usuario::class . ':usuarioGet');
      $app->get('/{usuario_id}', \usuario::class . ':usuarioGet');
  }); 
