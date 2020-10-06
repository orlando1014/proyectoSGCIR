<?php 

session_start();
if(($_SESSION['inspector']) !=''){

   }else {
	 header('Location: ../../index.php');
  }

	//Codificamos la zona horaria
	date_default_timezone_set('UTC');
	date_default_timezone_set('America/Bogota');

   
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>SGCIR</title>
	<link rel="stylesheet" type="text/css" href="../../librerias/bootstrap4/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>

<?php include('header.php'); ?>
	
	<form action="" id="formulariocuestionario">
		<div class="container" style="">

		<div class="row" style="margin-top: 1em">
			
				<div class="col-md-12">
					<div class="card">
					  <div class="card-header" id="numpregunta" style="text-align: center">
					    <strong>LISTA DE VERIFICACIÓN Y CHEQUEO PARA ANDAMIOS COLGANTES</strong>
					  </div>
					  <div class="card-body">
					  	<div class="row">
					  		<div class="col-md-5" class="form-group">
					  			<label for="">Realizado por:</label>
					  			<input type="text" class="form-control" disabled="" value="<?php echo $_SESSION['nombre_usuario'];?>">
					  		</div>
					  		<div class="col-md-5" class="form-group">
					  			<label for="">Proceso:</label>
					  			<input type="text" class="form-control" disabled="" value="Promoción y Prevención">
					  		</div>
					  		<div class="col-md-2" class="form-group">
					  			<label for="">Fecha:</label>
					  			<input type="text" class="form-control" style="text-align: center;" disabled="" value="<?php echo date('d-M-Y') ?>">
					  		</div>
					  	</div>
						<hr>

					  	<div class="row">
					  		<div class="col-md-5" class="form-group">
					  			<label for="">Obra o Proyecto:</label>
					  			<input type="text" class="form-control" id="nombreproyecto" name="nombreproyecto">
					  		</div>
					  		<div class="col-md-5" class="form-group">
					  			<label for="">Ubicación de Andamio:</label>
					  			<input type="text" class="form-control" id="ubicacion" name="ubicacion">
					  		</div>
					  		<div class="col-md-2" class="form-group">
					  			<label for="">N° Lista:</label>
					  			<input type="text" class="form-control" disabled="" id="listaverificacion" style="text-align: center" name="listaverificacion">
					  		</div>
					  	</div>
					    
					  </div>
					  <div class="row" style="	margin-bottom: 1em;padding: 1em">	
						<div class="col-md-4"></div>
						<div class="col-md-4">
							<button class="btn btn-info btn-block" id="iniciarcuestionario" type="button" onclick="return IniciarCuestionario()">Iniciar Cuestionario >> </button>
						<div class="col-md-4"></div>
						</div>

					  </div>
					</div>
					<!-- <div class="card-footer">
						<button class="btn btn-primary">Siguiente pregunta</button>
					</div> -->
				</div>

		</div>
		
	</div>
	</form>
		



	
	<script src="../../librerias/bootstrap4/jquery-3.4.1.min.js"></script>
	<script src="../../librerias/bootstrap4/popper.min.js"></script>
	<script src="../../librerias/bootstrap4/bootstrap.min.js"></script>
	<script src="../../librerias/sweetalert.min.js"></script>
	<script src="../../js/crud.js"></script>
	<script src="../../js/cuestionario.js"></script>


	
	<!-- <script> alert("Bienvenido al formulario principal"); </script> -->
</body>
</html>