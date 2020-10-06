<?php
session_start();
require_once "../conexion/Usuario.php";

$correo_usuario=$_POST['correo'];
$clave_usuario=$_POST['clave'];

$obj= new Usuario(); // creamos nuetro objeto y una nueva instancia de crud

$respuesta = $obj->Login($correo_usuario,$clave_usuario);
//echo $respuesta;

if($respuesta){
	//Si la respuesta contiene datos creamos las varibles de sesiones
	
	$_SESSION['nombre_usuario'] = $respuesta['nombre_usuario'];
	$_SESSION['idusuario'] = $respuesta['idusuario'];
	
	//validamos el rol del usuario q esta intando ingresar, si es 1 se inicia sección como administrador
	if($respuesta['idrol'] == 1){
		$_SESSION['administrador'] = $correo_usuario;
		header('location:../vistas/administrador/index.php');
		echo '<script> alert("Bienvenido al formulario principal"); </script>';
	}
	else{
		$_SESSION['inspector'] =$correo_usuario;
		header('location:../vistas/inspector/index.php');
		echo '<script> alert("Bienvenido:Por favor completar el formulario"); </script>';
	}
}
else{
		//Si los datos de ingresos son incorretos le mostrara una alerta y lo rediridira al login
		echo "<script>alert('El correo o la contraseña son incorrectos, por favor revise e intente nuevamente');</script>";
		echo "<script>window.location='../errorsesion.php';</script>";
	

}
?>