<?php
session_start();
require_once "../conexion/Cuestionario.php";
$obj= new Cuestionario();


$datos=array(
     'nombreproyecto' => $_POST['nombreproyecto'],
     'ubicacion' => $_POST['ubicacion'],
     'fechaelaboracion' => date('Y-m-d'),
     'listaverificacion' => $_POST['listaverificacion'],
     'idusuario' => $_SESSION['idusuario'],
     'terminado' => "NO" 
    );

echo $obj->RegistrarCuestionario($datos);
?>