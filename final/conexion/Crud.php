<?php
//extends es heredar en este caso estamos heredando a conexion 
require_once "Conexion.php";



/**
 * creamos una clase Crud ;
 * en la cual se hereda Conexion
 * 
 * Donde la funcion Es Mostrar Datos 
 */
class Crud extends Conexion{
          public  function  mostrarDatos(){
            $sql="SELECT idusuario ,
                          nombre_usuario,
                          correo_usuario,
                          cedula_usuario,
                          clave_usuario,
                         idrol
                         from tbl_usuarios";
$query=Conexion::conectar()->prepare($sql); //prepara mi query
$query->execute();
return $query->fetchAll();// retorno del todo de los registros 
$query->close(); // aqui cerramos la conexion
}



/**
 * Insertando datos en la tabla usuarios
 * @param string, $datos (nombre_usuario,correo_usuario,cedula_usuario,clave_usuario,)  int (idrol)
 * @return  void
 */

public function insertarDatos($datos){
  $sql="INSERT into tbl_usuarios (nombre_usuario,correo_usuario,cedula_usuario,clave_usuario,idrol)
  values (:nombre_usuario,:correo_usuario,:cedula_usuario,:clave_usuario,:idrol)";
  

 $query=Conexion::conectar()->prepare($sql); //prepara mi query
 $pass = sha1($datos["clave_usuario"]);
$query->bindParam(":nombre_usuario", $datos["nombre_usuario"], PDO::PARAM_STR);
$query->bindParam(":correo_usuario", $datos["correo_usuario"], PDO::PARAM_STR);
$query->bindParam(":cedula_usuario", $datos["cedula_usuario"], PDO::PARAM_STR);
$query->bindParam(":clave_usuario", $pass, PDO::PARAM_STR);
$query->bindParam(":idrol", $datos["idrol"], PDO::PARAM_INT);

return $query->execute();
$query->close(); // aqui cerramos la conexion

}


/**
 * Aqui creamos la funcion Obtener Datos 
 * @param string, $datos (nombre_usuario,correo_usuario,cedula_usuario,clave_usuario,)  int (idrol)
 * @return idusuario
 */
public function obtenerDatos($idusuario){
  $sql="SELECT idusuario ,
               nombre_usuario,
              correo_usuario,
              cedula_usuario,
              clave_usuario,
               idrol
            from tbl_usuarios where idusuario=:idusuario ";
$query=Conexion::conectar()->prepare($sql); //prepara mi query
$query->bindParam(":idusuario",$idusuario, PDO::PARAM_INT);
$query->execute();
return $query->fetch();// con esto se hace para que regrese una fila
$query->close(); // aqui cerramos la conexion


}
/**
 * Aqui creamos la funcion Actualizar Datos 
 * @param string, $datos (nombre_usuario,correo_usuario,cedula_usuario,clave_usuario,)  int (idrol)
 * @return $datos
 */


public function actualizarDatos($datos){
  $sql="UPDATE tbl_usuarios set nombre_usuario = :nombre_usuario,
  correo_usuario = :correo_usuario,
  cedula_usuario = :cedula_usuario,
  -- clave_usuario = :clave_usuario,
   idrol= :idrol
   where idusuario=:idusuario";
   $query=Conexion::conectar()->prepare($sql); //prepara mi query
  // $pass = sha1($datos["clave_usuario"]); // variable para encriptar la contraseña
   $query->bindParam(":nombre_usuario", $datos["nombre_usuario"], PDO::PARAM_STR);
$query->bindParam(":correo_usuario", $datos["correo_usuario"], PDO::PARAM_STR);
$query->bindParam(":cedula_usuario", $datos["cedula_usuario"], PDO::PARAM_STR);
// $query->bindParam(":clave_usuario", $pass, PDO::PARAM_STR);
$query->bindParam(":idrol", $datos["idrol"], PDO::PARAM_INT);
$query->bindParam(":idusuario", $datos["idusuario"], PDO::PARAM_INT);
return $query->execute();
$query->close(); // aqui cerramos la conexion

}

/**
 * Aqui creamos la funcion eliminar datos
 * @param int $idusuario    idusuario
 * @return void
 */
public function eliminarDatos($idusuario){
  $sql ="DELETE from tbl_usuarios where idusuario=:idusuario ";
  $query=Conexion::conectar()->prepare($sql); //prepara mi query
  $query->bindParam(":idusuario",$idusuario, PDO::PARAM_INT);
  return $query->execute();
  $query->close(); // aqui cerramos la conexion

}
}


//2
?>