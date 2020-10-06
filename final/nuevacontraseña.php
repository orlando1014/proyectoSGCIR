<?php
include "mostrar-pdf/conexiondb/conn.php";
$id=$_REQUEST['codigo'];

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>SGCIR</title>
	<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >

    <link rel="stylesheet" type="text/css" href="estilos/css/estilos.css">
</head>
<body>
<body background="estilos/img/imagen.jpg">

    <form class="formulario" id="formulariologin" method="POST" action="procesos/valpass.php">

    <h1>Restablecer Contraseña </h1>
         <div class="contenedor">
         <div class="input-contenedor">
         <i class="fas fa-user icon"></i>
                <input type="password" placeholder="Nueva Contraseña" name="codigo" id="clave"  class="form-control form-control-sm" value="<?php echo"".$id?>">
             </div>

             <div class="input-contenedor">
                <i class="fas fa-key icon"></i>
                <input type="password" placeholder="Nueva Contraseña" name="clave" id="clave"  class="form-control form-control-sm" maxlength="12" minlength="5" required="">
             </div>

             <div class="input-contenedor">
                <i class="fas fa-key icon"></i>
                <input type="password" placeholder="Repetir Contraseña" name="clave2" id="clave2"  class="form-control form-control-sm" maxlength="12" minlength="5" required="">
             </div>

             <input type="submit" value="Cambiar Contraseña"  class="button" id="ingresar">
             <p>
             
         </div>
    </form>
    <script src="librerias/bootstrap4/jquery-3.4.1.min.js"></script>
    <script src="librerias/sweetalert.min.js"></script>
    <script src="js/login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!-- aqui abrimos etiquetas para codigo php, luego hacemos una consulta para mirar is el usuario tiene un toke vijente -->
    <?php
        $consu="SELECT * from `tbl_usuarios` where `idusuario`='$id' ";
        $respu=$conn->query($consu);
        while( $row = $respu->fetch_assoc()){
            $tok=$row['TOKEN'];
        }

//  si token es igual a 0 quiere decir que no esta vijente y por ende ya ha cido usado y le mostrara una alerta de js
        if($tok==0) {
            ?>
            <script src='js/opciones.js'></script>

            <?php 
        }
            ?>

</body>
</html>

