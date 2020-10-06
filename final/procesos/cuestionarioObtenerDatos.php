<?php 
session_start();
require_once "../conexion/Cuestionario.php";

$obj= new Cuestionario(); // creamos nuetro objeto y una nueva instancia de crud
echo json_encode($obj->ObtenerDatosCuestionario($_SESSION['idusuario']));
?>