<?php
require_once "../conexion/Pregunta.php";
$obj= new Pregunta();

//COnfiguramos la zona horario
date_default_timezone_set('UTC');
date_default_timezone_set('America/Bogota');

$nombreimagen = "";

if($_POST['imagen'] == 'S'){
	//Creamos el nombre de la imagen
	$nombreimagen = 'IMG'.'-'.date('dmy').'-'.date('his');
	//Creamos la ruta hacia donde enviaremos la imagen
	$ruta_imagen = "../images/".$nombreimagen.".jpeg";
	//Validamos si hay una imagen
	move_uploaded_file($_FILES['archivo']['tmp_name'],$ruta_imagen);
}

$datos=array(
     'idcuestionario' => $_POST['idcuestionario'],
     'numero' => $_POST['numero'],
     'pregunta' => $_POST['pregunta'],
     'categoria' => $_POST['categoria'],
     'respuesta' => $_POST['respuesta'], 
     'observacion' => $_POST['observacion'], 
     'imagen' => $_POST['imagen'], 
     'nombreimagen' => $nombreimagen 
    );

//move_uploaded_file($_FILES['archivo']['tmp_name'],"../images/image.jpg");
//echo  var_dump($_FILES['archivo']['size']);

echo $obj->RegistrarPregunta($datos);
?>