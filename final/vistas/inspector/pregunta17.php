<!DOCTYPE html>
<html>
<head>
	<title>PDO</title>
	<link rel="stylesheet" type="text/css" href="../../librerias/bootstrap4/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>



<?php include('header.php'); ?>
	
	<div class="container" style="">
		<div class="row" style="margin-top: 1em">
				
				<div class="col-md-12">
					<div class="card">
					  <div class="card-header" id="numpregunta">
					    Pregunta 17: (DESENSAMBLE)
					  </div>
					  <div class="card-body">

					  	<form action="" enctype="multipart/form-data" name="formulario" id="formulario">
					  		<div class="row">
						  		<div class="col-md-8">
						  			<h5 class="card-title" id="pregunta">¿Se verificó que cada persona sobre  el andamio colgante esté unida a un Sistema protector contra caídas (línea de vida) que sea independiente al de su compañero.?</h5>
								    <!-- <p class="card-text">Se ha verificado que no hayan cables eléctricos expuestos, obstrucciones que puedan sobrecargar o inclinar el andamio colgante al levantarlo o bajarlo, bordes de techos o aberturas antes de usarlo.</p> -->
								    <div class="form-check">
									  <input class="form-check-input" type="radio" name="radios" id="si" value="SI">
									  <label class="form-check-label" for="si">
									    SI
									  </label>
									</div>
									<div class="form-check">
									  <input class="form-check-input" type="radio" name="radios" id="no" value="NO">
									  <label class="form-check-label" for="no">
									    NO
									  </label>
									</div>
									<div class="form-check">
									  <input class="form-check-input" type="radio" name="radios" id="na" value="N/A">
									  <label class="form-check-label" for="N/A">
									    N/A
									  </label>
									</div>
									
									<div class="form-group" style="margin-top: 0.6em">
									  <strong><label for="observacion">Observación:</label></strong>
									  <textarea class="form-control" rows="2" id="observacion" name="observacion"></textarea>
									</div>
																
						  		</div>

						  		<div class="col-md-4">
						  			<div id="preview" style="text-align: center">
					                    <img src="../../estilos/noimage.png" style="width: 180px;height: 200px" class="img-fluid" id="muestraimagen" name="muestraimagen">
					                </div>
									<div class="form-group" style="margin-top: 1em;text-align: center">
					                	<label for="" id="respuestaimg">Sin imagen</label>
									    <input type="file" class="form-control-file" id="archivo" name="archivo" accept="image/png,image/jpeg">
									</div>
						  		</div>
						  	</div>
						    

						  <div class="row" style="	margin-bottom: 1em;padding: 1em">	
							<div class="col-md-4">
								<a class="btn btn-danger btn-block proceso-pregunta" href="pregunta16.php" type="button">	Pregunta Anterior</a>
							</div>
							<div class="col-md-4"></div>
							<div class="col-md-4">
								<a class="btn btn-primary btn-block proceso-pregunta" href="pregunta18.php">	Siguiente pregunta</a>
							</div>
						  </div>
					  	</form>
					  <!-- Fin del row botones -->
					  </div>

					</div>
					<!-- <div class="card-footer">
						<button class="btn btn-primary">Siguiente pregunta</button>
					</div> -->
				</div>
			</div>
		
	</div>	



	
	<script src="../../librerias/bootstrap4/jquery-3.4.1.min.js"></script>
	<script src="../../librerias/bootstrap4/popper.min.js"></script>
	<script src="../../librerias/bootstrap4/bootstrap.min.js"></script>
	<script src="../../librerias/sweetalert.min.js"></script>
	<script src="../../js/crud.js"></script>
	<script src="../../js/pregunta.js"></script>

	<script>
		//Generamos la imagen para PREVISUALIZAR
		  document.getElementById("archivo").onchange = function(e) {
		  // Creamos el objeto de la clase FileReader
		  let reader = new FileReader();

		  // Leemos el archivo subido y se lo pasamos a nuestro fileReader
		  reader.readAsDataURL(e.target.files[0]);

		  // Le decimos que cuando este listo ejecute el código interno
		  reader.onload = function(){
		    let preview = document.getElementById('preview'),
		            image = document.createElement('img');
		            image.setAttribute("style","width: 180px;height: 200px");
		            image.setAttribute("class","img-fluid");
		           

		    image.src = reader.result;

		    preview.innerHTML = '';
		    preview.append(image);
		  };
		}

		//Ahora llamamos a la función creamos con el numero de la pregunta
		$(document).ready(function(){
			ObtenerPregunta(17);

			//AHora cuando presionemos en siguiente le asignamos los valores 
			$(".proceso-pregunta").click(function(){
				ProcesosPregunta(17,"Desensamble");

			});
		});

	</script>
	

</body>
</html>