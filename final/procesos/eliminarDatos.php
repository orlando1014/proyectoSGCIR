<?php
//Aqui requerimos del archivo Crud.php
require_once "../conexion/Crud.php";

$idusuario=$_POST['idusuario'];

$obj= new Crud(); // creamos nuetro objeto y una nueva instancia de crud

//aqui nuestro $obj obtiene un $idusuario para eliminar Datos o registro
echo $obj->eliminarDatos($idusuario);


