<?php

     session_start();
     if(($_SESSION['administrador']) !=''){

         }else {
           header('Location: ../../index.php');
         }


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title>Inicio Admin</title>
	<link rel="stylesheet" href="../../estilos/css/estilos_vista_ai.css">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script src="../../push.js/push.min.js"></script>



</head>
<body>


<h1 class="title">Bienvenido al inicio Administrador</h1>

    <div class="container">
       
        <div class="card">
            <img src="../../estilos/img/inspectors.png">
            <h4>Actualizar-Registrar-Borrar</h4>
            <p>En este campo podras  registrar, actualizar, borrar y ver usuarios registrados.</p>
    
            <a href="registrousuarios.php">Registrar usuarios</a>
        </div>
        
        <div class="card">
            <img src="../../estilos/img/verform.jpg">
            <h4>Ver Formularios</h4>
            <p>En este campo podras observar los formularios ya realizados por los inspectores.</p>
            <a href="../../mostrar-pdf/proceso/buscar.php">ver formularios</a>
        </div>
        
        <div class="card">
            <img src="../../estilos/img/salir.jpg">
            <h4>Salir</h4>
            <p>En este campo podras cerrar la sesión  cada ves que lo desees.</p>
            <a href="../../procesos/cerrar.php">Cerrar sesión</a>
        </div>
        
    </div>
    


</body>
<?php
// llamamos la conexión y hacemos una consulta en la tabla notificación
include "../../mostrar-pdf/conexiondb/conn.php";
$cons="SELECT * from `notificacion` ";
    $resp=$conn->query($cons);

    if (!$resp) {
        echo"ha abido u error un error";
    }while( $row = $resp->fetch_assoc()){
        $vis=$row['visto'];
    }
// si el visto es menor a uno no se ha visto entonces le mostrara una notificación  
    if($vis<1){
?>

	
    <script>

        Push.create("hay nuevas inspecciones disponibles"); 
    
    </script>

    <?php $query="UPDATE `notificacion` set `visto` = '1'";
    $res= $conn->query($query);?>
    
    <?php }?>
</html>