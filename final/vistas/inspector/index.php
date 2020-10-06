 <?php

   session_start();
     if(($_SESSION['inspector']) !=''){

        }else {
          header('Location: ../../index.php');
       }


?> 
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title>Bienvenido al inicio Inspector </title>
	<link rel="stylesheet" href="../../estilos/css/estilos_vista_ai.css">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>

<h1 class="title">   Bienvenido al inicio Inspector  </h1>
    
    <div class="container">
       
    <div class="card">
            <img src="../../estilos/img/verform.jpg">
            <h4>Ver Formularios enviados</h4>
            <p>En este campo podras observar los formularios que ya has realizado</p>
            <a href="../../mostrar-pdf/proceso/busc.php">ver formularios</a>
        </div>
        
        <div class="card">
            <img src="../../estilos/img/form.png">
            <h4>Formulario</h4>
            <p>En este campo te enviara a otra ventana(formulario) para realizar tu inspección.</p>
            <a href="cuestionario.php">Abrir el formulario</a>
        </div>
        
        <div class="card">
            <img src="../../estilos/img/salir.jpg">
            <h4>Salir</h4>
            <p>En este campo podras cerrar la sesión  cada ves que lo desees.</p>
            <a href="../../procesos/cerrar.php">Cerrar sesión</a>
        </div>
        
    </div>
    


</body>
<script type="text/javascript">
		alert("Bienvenido Inspector");
		mostrar();
		

	</script>
</html>