<?php

//Aqui requerimos del archivo Crud.php

require_once "../conexion/Crud.php";
//creamos una variable $obj
$obj= new Crud(); // creamos nuetro objeto y una nueva instancia de crud

//aqui en la variable $datos vamos actualizar , los registros ingresado , como nombre, correo , cedula clave
//idrol
$datos=array(
     'nombre_usuario' => $_POST['nombre_usuarioA'],
     'correo_usuario' => $_POST['correo_usuarioA'],
     'cedula_usuario' => $_POST['cedula_usuarioA'],
    //  'clave_usuario' => $_POST['clave_usuarioA'],
     'idrol' => $_POST['idrolA'],
     'idusuario'=> $_POST['idusuario'] 
    );

echo $obj->actualizarDatos($datos);


?>