<?php
//requiere del archivo Crud.php
require_once "../conexion/Crud.php";

$idusuario=$_POST['idusuario'];

$obj= new Crud(); // creamos nuetro objeto y una nueva instancia de crud

//por el metodo json se obtine un datos para $obj 
echo json_encode($obj->obtenerDatos($idusuario));

?>