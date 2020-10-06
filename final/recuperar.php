<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>SGCIR</title>
	<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >

    <link rel="stylesheet" type="text/css" href="estilos/css/estilos.css">
</head>
<body  background="estilos/img/imagen.jpg">

    <form  class="formulario" id="" method="POST" action="procesos/recuperar_clave.php" >
   
                    <h1>Recuperación de contraseña </h1>
        
                <label align="center">Rol para recuperar contraseña</label>
              <select id="idrol" name="idrol"  class="form-control form-control-sm"> 
                <option value="1">1- ADMINISTRADOR</option>
                <option value="2">2- INSPECTOR</option>
                </select>
              <br>
            
         <div class="contenedor">
             <div class="input-contenedor">
            
                 <i class="fas fa-envelope icon"></i>
                 <input type="email" placeholder="Ingrese Correo Electronico" name="correo_usuario">
             </div>


             <input type="submit" value="Restablecer Contraseña"  class="button" name="codigo">
             <p>
             <a class="link" href="index.php">Atras</a></p> 
         </div>
    </form>

    <script src="librerias/bootstrap4/jquery-3.4.1.min.js"></script>
    <script src="librerias/sweetalert.min.js"></script>
    <script src="js/login.js"></script>

</body>
</html>
