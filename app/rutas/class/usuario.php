<?php
class usuario1{
    public function insert(\PDO $conexion, $contenido){
        $datos = $contenido['contenido']; 
        $sql = "INSERT INTO usuario 
                (nombre, apellido, dni, fecha_nacimiento,correo_electronico, foto_perfil, fecha_transaccion)
                VALUES
                (:nombre, :apellido, :dni, :fecha_nacimiento, :correo_electronico, :foto_perfil, :fecha_transaccion)";
        $resultado = $conexion->prepare($sql);
        $data =[
                'nombre'               => $datos->item->nombre,
                'apellido'             => $datos->item->apellido,
                'dni'                  => $datos->item->dni,
                'fecha_nacimiento'     => $datos->item->fecha_nacimiento,
                'correo_electronico'   => $datos->item->correo_electronico,
                'foto_perfil'          => $datos->item->foto_perfil,
                'fecha_transaccion'    => date('Y-m-d H:i:j')
               ];
        $resultado->execute($data);
        $conexion->lastInsertId();
        $conexion->commit();
        $respuesta = json_encode(array(
            'titulo'                          =>   'La información fue guardada con éxito',
            'sistema' => $contenido ));
     return $respuesta;
    }
    public function select(\PDO $conexion, array $contenido){
        $args = $contenido['args'];
        $usuario_id = $args['usuario_id'];
     
        $resultado = "";
        $where = "";
     
        if($usuario_id){$where .= " and usuario_id = ".$usuario_id;}
        
        $sql = "SELECT usuario.nombre, usuario.apellido, usuario.dni, usuario.fecha_nacimiento,
                usuario.correo_electronico, usuario.foto_perfil, usuario.fecha_transaccion FROM
                usuario 
                WHERE 1 ".$where;
         $resultado = $conexion->prepare($sql);
         $resultado->execute(); 
         $conexion->commit();
         $respuesta = json_encode(array(
          'titulo'                          =>   'Consulta exitosa', 
          'contenido'                       =>   $resultado->fetchAll(PDO::FETCH_OBJ),
          'sistema' =>  $contenido));
        return $respuesta; 
        }

}