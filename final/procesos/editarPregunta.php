<?php
require_once "../conexion/Pregunta.php";
$obj= new Pregunta();


if($_POST['imagen'] == 'S'){
	//Codificamos la zona horaria
	date_default_timezone_set('UTC');
	date_default_timezone_set('America/Bogota');
	//Creamos el nombre de la imagen
	if($_POST['nombreimagen'] != "" || $_POST['nombreimagen'] != null){
		$nombreimagen = $_POST['nombreimagen'];
	}
	else{
		$nombreimagen = 'IMG'.'-'.date('dmy').'-'.date('his');
	}
	//Creamos la ruta hacia donde enviaremos la imagen
	$ruta_imagen = "../images/".$nombreimagen.".jpeg";
	//Validamos si hay una imagen
	move_uploaded_file($_FILES['archivo']['tmp_name'],$ruta_imagen);
}

if($_POST['valimagen'] == 'S'){
	$datos=array(
     'respuesta' => $_POST['respuesta'],
     'observacion' => $_POST['observacion'],
     'imagen' => $_POST['imagen'],
     'nombreimagen' => $_POST['nombreimagen'],
     'idcuestionario' => $_POST['idcuestionario'], 
     'numero' => $_POST['numero']
    );


echo $obj->EditarPregunta($datos);

}else{
	$datos=array(
     'respuesta' => $_POST['respuesta'],
     'observacion' => $_POST['observacion'],
     'imagen' => $_POST['imagen'],
     'nombreimagen' => $nombreimagen,
     'idcuestionario' => $_POST['idcuestionario'], 
     'numero' => $_POST['numero']
    );


echo $obj->EditarPregunta($datos);
echo 'Se modificara la imagen';
}


?>