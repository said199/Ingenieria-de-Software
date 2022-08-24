<?php

use App\Lib\db;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Psr7\Response;

class usuario{
    function __construct(){
        $db = new db();
        $db = $db->conectDB();
        $this->conexion = $db;
    }
    //Creamos cuenta contable.
   public function usuarioPost(Request $request, Response $response, array $args): Response{ 
    $this->conexion->beginTransaction();
    
    try{
      $parsedBody = $request->getParsedBody();
      $contenido = array(
        'args' => $args,
        'queryParams' => $request->getQueryParams(), 
        'contenido' => json_decode($parsedBody['contenido'])
      );
      require __DIR__ . '/class/usuario.php';
      $objeto = new usuario1;
      $respuesta = $objeto->insert($this->conexion, $contenido);
    }catch(PDOException $e) {
      $respuesta = json_encode(array(
        'sistema' => $contenido,
        'errorResponse' => array(
              'error'             => true,
              'estado'            => '1-0',
              'error_mensaje'      => 'Error al crear documento',
              'sistema' => $e->getMessage()
        )
      ));
    }

    $response->getBody()->write($respuesta);
    return $response;
   }

   public function usuarioGet(Request $request, Response $response, array $args): Response{
    $this->conexion->beginTransaction();
   
   try{
    //$parsedBody = json_decode($request->getBody());
    $parsedBody = $request->getParsedBody();
    $contenido = array(
         'args' => $args,
         'queryParams' => $request->getQueryParams(),
         'contenido'   => json_decode($parsedBody['contenido'])
     );
     require __DIR__ . '/class/usuario.php';
     $objeto = new usuario1;
     $respuesta = $objeto->select($this->conexion,$contenido);
 
   }catch(PDOException $e) {
     $respuesta = json_encode(array(
       'sistema' => $contenido,
       'errorResponse' => array(
             'error'             => true,
             'estado'            => '1-0',
             'error_mensaje'      => 'Error al actualizar el documento',
             'sistema' => $e->getMessage()
       )
     ));
   }
     $response->getBody()->write($respuesta);
     return $response;
   }  
}