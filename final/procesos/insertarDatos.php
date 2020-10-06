<?php
//aqui requerimos el archivo conn.php CONEXION
require_once "../mostrar-pdf/conexiondb/conn.php";

$corr=$_POST['correo_usuario'];
$cedu=$_POST['cedula_usuario'];



//Aqui creamos una variable $bcorr , en la cual nos ayuda para validar si hay un 
// correo ya creado en la base de datos
$bcorr = mysqli_query($conn,"SELECT * from `tbl_usuarios` where `correo_usuario` = '$corr' ");
 if((mysqli_num_rows($bcorr) == 0)){

//Aqui creamos una variable $bcedu , en la cual nos ayuda para validar si hay una 
// cedula ya creada en la base de datos
    $bcedu = mysqli_query($conn,"SELECT * from `tbl_usuarios` where `cedula_usuario` = '$cedu' ");
     if((mysqli_num_rows($bcedu) == 0)){
        // aqui insertaremos los datos a la bd
        require_once "../conexion/Crud.php";
        $obj= new Crud();
        
        $datos=array(
         'nombre_usuario' => $_POST['nombre_usuario'],
         'correo_usuario' => $_POST['correo_usuario'],
         'cedula_usuario' => $_POST['cedula_usuario'],
         'clave_usuario' => $_POST['clave_usuario'],
         'idrol' => $_POST['idrol'] ,
         'TOKEN' => 0
        );
        echo $obj->insertarDatos($datos);
      

     }else{
        //ruta 
        header('location: ../vistas/administrador/index.php');
    }

 }else{
    //ruta 
    header('location: ../vistas/administrador/index.php');
}



?>