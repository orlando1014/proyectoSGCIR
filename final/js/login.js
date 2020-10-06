
function Login(){
  var datos = {
  	"correo":$("#correo").val(),
  	"clave":$("#clave").val()
  };
  	
  
	$.ajax({
		url:'procesos/loginValidacion.php',
		data:$("#formulariologin").serialize(),
		type:'POST',
		success:function(e){
			alert(e);
		}
	});

	//return e;
}


