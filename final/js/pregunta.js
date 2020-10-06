//Creamos varibles globales 
var G_IDCUESTIONARIO = "";
var G_RESPUESTA = "";
var G_NOMBREIMAGEN = "";
var G_VALIMAGEN = ""; // S = SI HAY IMAGEN / N= NO HAY IMAGEN / R = REEMPLAZAMOS LA IMAGEN
var G_IMAGEN = "";

//Obtenemos el cuestionario de activo 
function ObtenerCuestionario(){
	$.ajax({
		type:"POST",
		url:"../../procesos/cuestionarioObtenerDatos",
		success:function(e){
			var respuesta = jQuery.parseJSON(e);
			G_IDCUESTIONARIO = respuesta['idcuestionario'];
			//alert(G_IDCUESTIONARIO);		
		}
	});
}
ObtenerCuestionario();

//Obtenemos la pregunta 

function ObtenerPregunta(numero){
	$.ajax({
		type:"POST",
		url:"../../procesos/preguntaObtener.php",
		data:"numero="+numero,
		success:function(e){
			var registros =JSON.parse(e);
			if(registros.respuesta == null || registros.respuesta == ""){
				G_RESPUESTA = "NO";
				$("#na").prop("checked", true);

			}else{
				G_RESPUESTA = "SI";
				G_NOMBREIMAGEN =registros['nombreimagen'];
				G_IMAGEN = registros['imagen'];
				
				//alert(G_NOMBREIMAGEN);

				if(registros['respuesta'] == "SI"){
					$("#si").prop("checked", true);
				}else if(registros['respuesta'] == "NO"){
					$("#no").prop("checked", true);
				}else{
					$("#na").prop("checked", true);
				}
				//Obtenemos la observacion
				$("#observacion").val(registros['observacion']);

				//Validamos si hay imagen 
				$("#respuestaimg").text(registros['nombreimagen']);

				if(registros['imagen'] == 'S'){
					$("#preview").html('<img src="../../images/'+registros['nombreimagen']+'.jpeg" style="width: 180px;height: 200px" class="img-fluid" id="muestraimagen" name="muestraimagen">');
				}
				else{
					$("#preview").html('<img src="../../estilos/noimage.png" style="width: 180px;height: 200px" class="img-fluid" id="muestraimagen" name="muestraimagen">');
				}
			}
			//alert(G_RESPUESTA);
		 //$('#listaverificacion').val(e);
			
		}
	});
	//alert("hola");
}

$("#archivo").click(function(){
	if(G_RESPUESTA == "SI"){
		// if(G_NOMBREIMAGEN != "" || G_NOMBREIMAGEN != null){
		// 	G_VALIMAGEN = "S";
		// }
		// else{
		// 	G_VALIMAGEN = "N";
		// }
		G_VALIMAGEN = "E";
	}
});




//Creamos una función para registrar Pregunta 
function ProcesosPregunta(numero,categoria){
	//var valor = $("input[name='radios']:checked").val();

	//Aqui validamos si NO hay registro = REGISTRAR de lo contrario
	//solo editamos los campos
	if(G_RESPUESTA == "NO"){
		
		var formData = new FormData();
		formData.append("idcuestionario",G_IDCUESTIONARIO);
		formData.append("numero",numero);
		formData.append("pregunta",$("#pregunta").text());
		formData.append("categoria",categoria);
		formData.append("respuesta",$("input[name='radios']:checked").val());
		formData.append("observacion",$("#observacion").val());
        
        if($("#archivo").val().trim() != ""){
			formData.append("imagen","S");
        }
        else{
			formData.append("imagen","N");
        }
	
    

        formData.append("archivo",$("#archivo")[0].files[0]);
        
		//Ahora ejecutamos nuestros ajax
		$.ajax({
			url:"../../procesos/preguntaRegistrar.php",
			type:"POST",
			data:formData,
	        contentType:false,
	        processData:false,
	        cache:false,// donde llamamos  el formulario con su id
			success:function(r){
	    		//alert(r);
			}
		});

	}
	else
	{
		//alert("Esto sera un editar");

		var formData = new FormData();
		formData.append("respuesta",$("input[name='radios']:checked").val());
		formData.append("observacion",$("#observacion").val());

	
		if(G_VALIMAGEN == ""){
			formData.append("valimagen","S"); // SIN MODIFICACIÓN
			formData.append("imagen",G_IMAGEN);

		}
		else{
			formData.append("valimagen","E"); // EDITAR IMAGEN

			if($("#archivo").val() != "")
			{
				formData.append("imagen","S");
	        }
	        else
	        {
				formData.append("imagen","N");
	        }
		}

		
		if(G_NOMBREIMAGEN == "null" || G_NOMBREIMAGEN == null || G_NOMBREIMAGEN ==""){
        	formData.append("nombreimagen","");
		}
		else
		{
        	formData.append("nombreimagen",G_NOMBREIMAGEN);
		}
		
		
		
        formData.append("idcuestionario",G_IDCUESTIONARIO);
		formData.append("numero",numero);
        formData.append("archivo",$("#archivo")[0].files[0]);

	//Ahora ejecutamos nuestros ajax
		$.ajax({
			url:"../../procesos/editarPregunta.php",
			type:"POST",
			data:formData,
	        contentType:false,
	        processData:false,
	        cache:false,// donde llamamos  el formulario con su id
			success:function(r){
	    		//alert(r);
			}
		});
	}
	
	
}

// function EditarPregunta(numero){
// 	//var valor = $("input[name='radios']:checked").val();

	
	
// }

// $("#siguiente").click(function(){
// 	RegistrarPregunta();
// });




