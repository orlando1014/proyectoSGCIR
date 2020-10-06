<?php

require_once "../conexion/Crud.php";  // ruta al que queremos acceder

$obj= new Crud(); // creamos nuetro objeto y una nueva instancia de crud
$datos=$obj->mostrarDatos();


$tabla='<table class="table table-dark">
<thead>
    <tr class="font-weight-bold">
        <td>Nombre</td>
        <td>Correo</td>
        <td>cedula</td>
      
        <td>Rol</td>
        <td>Editar</td>
        <td>Eliminar</td>
    </tr>
</thead>
<tbody>';

$datosTabla=""; // aqui va estar vacia porque es donde vamos a crear todos los registros 

foreach ($datos as $key => $value){  //aqui copiamos los campos de la tabla a mostrar
    $datosTabla=$datosTabla.'<tr>
    <td>'.$value['nombre_usuario'].'</td>
    <td>'.$value['correo_usuario'].'</td>
    <td>'.$value['cedula_usuario'].'</td>
   
    <td>'.$value['idrol'].'</td>
    <td>
        <span class="btn btn-warning btn-sm" onclick="obtenerDatos('.$value['idusuario'].')" data-toggle="modal" data-target="#actualizarModal">
            <i class="fas fa-edit"></i>  
        </span>
    
    </td>
    <td>
        <span class="btn btn-danger btn-sm" onclick="eliminarDatos('.$value['idusuario'].')">
            <li class="fas fa-trash-alt"></li>
        </span>
    </td>
</tr>'; 
}

echo $tabla.$datosTabla.'</tbody> </table>';



// aqui esta todo el metodo que nos regresa los datos 



//3

?>