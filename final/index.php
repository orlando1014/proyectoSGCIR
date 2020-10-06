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

    <form class="formulario" id="formulariologin" method="POST" action="procesos/loginValidacion.php">
    <h1>Bienvenidos </h1>

        <h1> <img src="estilos/img/logo.png" width="280" height="100" class="center" > </h1>
        
         <div class="contenedor">
             <div class="input-contenedor">
                 <i class="fas fa-envelope icon"></i>
                 <input type="email" placeholder="Correo Electronico" name="correo" id="correo"  class="form-control form-control-sm" required="">
             </div>

             <div class="input-contenedor">
                <i class="fas fa-key icon"></i>
                <input type="password" placeholder="Contraseña" name="clave" id="clave"  class="form-control form-control-sm" maxlength="12" minlength="5" required="">
             </div>

             <input type="submit" value="Ingresar"  class="button" id="ingresar">
             <p>
              <a class="link" href="recuperar.php">Recuperar contraseña</a></p> 
         </div>
    </form>

    <script src="librerias/bootstrap4/jquery-3.4.1.min.js"></script>
    <script src="librerias/sweetalert.min.js"></script>
    <script src="js/login.js"></script>

</body>
</html>
