//aqui creamos una funcion para Mostrar los datos en una tabla
function mostrar(){
	$.ajax({
		type:"POST",
		url:"../../procesos/mostrarDatos.php",
		success:function(r){
			$('#tablaDatos').html(r); //llamamos el id(tablaDatos) mediante js
			
		}
	});
}
//aqui creamos una funcion para obtener los datos del usuario
function obtenerDatos(idusuario){
	$.ajax({
		type:"POST",
		data:"idusuario=" + idusuario,
		url:"../../procesos/obtenerDatos.php",
		success:function(r){
		r=jQuery.parseJSON(r);

		 $('#idusuario').val(r['idusuario']);
		 $('#nombre_usuarioA').val(r['nombre_usuario']);
		 $('#correo_usuarioA').val(r['correo_usuario']);
		 $('#cedula_usuarioA').val(r['cedula_usuario']);
		 $('#clave_usuarioA').val(r['clave_usuario']);
		 $('#idrolA').val(r['idrol']);
			
		}
	});
}
//aqui creamos una funcion para Actualizar los datos del usuario
function actualizarDatos(){
	$.ajax({
		type:"POST",
		url:"../../procesos/actualizarDatos.php",
		data:$('#insertarcontenidoA').serialize(),// donde llamamos  el formulario con su id
		success:function(r){
			//alert(r);
    		if(r==1){
				$('#botonActualizar').trigger("click");
				mostrar();
				swal("Actualizado  con Exito",":D" ,"success" );
				//alert(r);
			}else{
				swal("!Error",":(" ,"Error al  Actualizar datos" );
				//alert(r);
			}
			
			
		}
	});	
	return false;
}



//aqui creamos una funcion para Eliminar los datos del usuario
function eliminarDatos(idusuario){
	swal({
		title: "¿Estas seguro de eliminar este registro?",
		text: "!Una vez eliminado no podra recuperarse¡",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	})
	.then((willDelete) => {
		if (willDelete) {
			$.ajax({
				type:"POST",
				url:"../../procesos/eliminarDatos.php",
				data:"idusuario=" + idusuario,
				success:function(r){
				
					if(r==1){
						mostrar();
						swal("Eliminado con Exito",":D" ,"success" );
					
					}else{
						swal("!Error",":(" ,"Error al Eliminar datos" );
						//alert(r);
					}
					
					
				}
			});		
		} 
	});
}
//aqui creamos una funcion para Insertar los datos del usuario o registro
function insertarDatos(){
	$.ajax({
		type:"POST",
		url:"../../procesos/insertarDatos.php",
		data:$('#insertarcontenido').serialize(),// donde llamamos  el formulario con su id
		success:function(r){
			//alert(r);
    		if(r==1){
				$('#insertarcontenido')[0].reset(); //limpiar formulario
				$('#botoncerrar').trigger("click");
				mostrar();
				swal("Agregado con Exito",":D" ,"success" );
			}else{
				swal("!Error",":(" ,"Error al registrar datos" );
				
			}
			
			
		}
	});	
	return false;
}