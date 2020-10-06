<?php 
session_start();
require_once "../conexion/Pregunta.php";

$obj = new Pregunta(); // creamos nuetro objeto y una nueva instancia de crud
$registro = $obj->ObtenerPregunta($_SESSION['idusuario'],$_POST['numero']);
echo json_encode($registro);
//echo $obj->ObtenerPregunta()['idpregunta'];
?>