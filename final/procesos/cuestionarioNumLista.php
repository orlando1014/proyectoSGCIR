<?php 
//session_start();
require_once "../conexion/Cuestionario.php";

$obj= new Cuestionario(); // creamos nuetro objeto y una nueva instancia de crud

$valorobtenido =$obj->GenerarNumeroLista()['cantidad']+1;

$numlista  = 'C'.'-'.date('Y').'-'. $valorobtenido;

echo $numlista;

?>

