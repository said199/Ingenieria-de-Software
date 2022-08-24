<?php
declare(strict_types=1);
date_default_timezone_set('America/Tegucigalpa');

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, token, usuario_id, empresa_id, version_app");
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');
header('Access-Control-Allow-Credentials: true');

if ($_SERVER["REQUEST_METHOD"] == 'OPTIONS') {
  header("HTTP/1.1 200 ");
  exit;
}

use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../app/conexion.php';

$app = AppFactory::create();

require __DIR__ . '/../app/rutas/rutas.php';
$app->run();
