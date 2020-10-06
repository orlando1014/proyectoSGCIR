<?php
session_start();
require_once "../conexion/Cuestionario.php";
$obj= new Cuestionario();


$datos=array(
     'nombreproyecto' => $_POST['nombreproyecto'],
     'ubicacion' => $_POST['ubicacion'],
     'idusuario' => $_SESSION['idusuario'],
    );

echo $obj->EditarCuestionario($datos);


?>