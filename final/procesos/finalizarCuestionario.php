<?php
session_start();
require_once "../conexion/Cuestionario.php";
$obj= new Cuestionario();
$obj->FinalizarCuestionario($_SESSION['idusuario']);
//y después de enviar datos lo envialos 
//y inserta en notificación el siguiente dato, pa'que le muestre una notificación al admin
require_once "../mostrar-pdf/conexiondb/conn.php";
$query="INSERT into `notificacion` (`visto`) VALUES ('0')";
$resultado= $conn->query($query);
//si al insertar datos no hay prblema le mostrará la siguiente alerta
if($resultado){
echo "<script>alert('inspección subida correctamete');</script>";
                echo "<script>window.location='../vistas/inspector/index.php';</script>";
}else{
    echo "<script>alert('inspección no se ha subido');</script>";
    echo "<script>window.location='../vistas/inspector/index.php';</script>";
 }

?>


    
    
    
 
