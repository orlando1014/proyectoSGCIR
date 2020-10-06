<?php

require_once "Conexion.php";

//extends es heredar en este caso estamos heredando a conexion 

class Usuario extends Conexion{

public function Login($correo_usuario,$clave_usuario){
    $sql="SELECT *FROM tbl_usuarios where correo_usuario=:correo_usuario and clave_usuario = :clave_usuario ";
    $query=Conexion::conectar()->prepare($sql); //prepara mi query
    $query->bindParam(":correo_usuario",$correo_usuario, PDO::PARAM_STR);
    $query->bindParam(":clave_usuario",sha1($clave_usuario), PDO::PARAM_STR);
    $query->execute();
    return $query->fetch();// con esto se hace para que regrese una fila
    $query->close(); // aqui cerramos la conexion
  }
}
?>