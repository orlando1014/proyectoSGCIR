var G_CUESTIONARIOACTIVO = "";
var G_IDCUESTIONARIO = "";

function GenerarNumLista(){
	$.ajax({
		type:"POST",
		url:"../../procesos/cuestionarioNumLista.php",
		success:function(e){
		 //alert(e);
		 $('#listaverificacion').val(e);
			
		}
	});
}

function ObtenerDatosCuestionario(){
	$.ajax({
		type:"POST",
		url:"../../procesos/cuestionarioObtenerDatos",
		success:function(e){
			var respuesta = jQuery.parseJSON(e);
			if(respuesta['idcuestionario'] == null || respuesta['idcuestionario'] == ""){
				GenerarNumLista();
				G_CUESTIONARIOACTIVO = "NO";
				G_IDCUESTIONARIO = "";
			}
			else{
				$("#nombreproyecto").val(respuesta['nombreproyecto']);
				$("#ubicacion").val(respuesta['ubicacion']);
				$("#listaverificacion").val(respuesta['listaverificacion']);
				G_CUESTIONARIOACTIVO = "SI";
				G_IDCUESTIONARIO = respuesta['idcuestionario'];
			}
		 //$('#listaverificacion').val(e);
			
		}
	});
}

//En caso hallan datos los obtenemos
ObtenerDatosCuestionario();

//Creamos la función para guardar o editar los registros del cuestinario
function IniciarCuestionario(){
	//Validamos si registramos o editamos los datos 
	//Creamos una array para enviar los datos al servidor y quitar los espacios 
	var datos = {
		"nombreproyecto":$("#nombreproyecto").val().trim(),
		"ubicacion":$("#ubicacion").val().trim(),
		"listaverificacion":$("#listaverificacion").val().trim()
	};

	//alert(G_CUESTIONARIOACTIVO);
	if(datos.nombreproyecto.length > 5 && datos.ubicacion.length > 5){
		if(G_CUESTIONARIOACTIVO == "NO" ){
			$.ajax({
				type:"POST",
				data:datos,
				url:"../../procesos/registrarCuestionario",
				success:function(e){
					//alert(e);
				}
			});
		}
		else{
			$.ajax({
				type:"POST",
				data:datos,
				url:"../../procesos/editarCuestionario",
				success:function(e){
					//alert(e);
				}
			});
		}

		//Sucedan cualquiera de las acciones enviamos a la primera pregunta 
		window.location.href = "pregunta1.php";
	}else{
		alert("Ingrese los datos correctamente");
	}
	
}

