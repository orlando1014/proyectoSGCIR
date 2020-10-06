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
	<title>PDO</title>
	<link rel="stylesheet" type="text/css" href="../../librerias/bootstrap4/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>



<?php include('header.php'); ?>
	<div class="container">

		<div class="row">
			<h2></h2>
			<div class="col-md-12">
				<div class="card text-left">
					<div class="card-header">
						<ul class="nav nav-tabs card-header-tabs">
							<li class="nav-item">
								<a class="nav-link active" href="#">Registro de Usuarios</a>
							</li>
						</ul>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<span class="btn btn-primary" data-toggle="modal" data-target="#insertarModal">
									<i class="fas fa-plus-circle"></i> Nuevo registro
								</span>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-12">
							<div id="tablaDatos"></div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



	<?php require_once "modalInsert.php" ?>
	<?php require_once "modalUpdate.php" ?>

	<script src="../../librerias/bootstrap4/jquery-3.4.1.min.js"></script>
	<script src="../../librerias/bootstrap4/popper.min.js"></script>
	<script src="../../librerias/bootstrap4/bootstrap.min.js"></script>
	<script src="../../librerias/sweetalert.min.js"></script>
	<script src="../../js/crud.js"></script>
	<script src="../../js/validation.js"></script>


	<script type="text/javascript">
		alert("Bienvenido para Registrar Usuarios");
		mostrar();
		

	</script>
</body>
</html>