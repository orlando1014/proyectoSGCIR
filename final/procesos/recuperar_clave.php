<?php

/**
 * Se incluye la conexión de la base de datos
 */
include "../mostrar-pdf/conexiondb/conn.php";

/**
 * Se requieren los archivos para la libreria PHPMailer
 */
include '../PHPMailer/PHPmailer.php';
include '../PHPMailer/SMTP.php';
include '../PHPMailer/Exception.php';


/**
* Si se envia el formulario para recuperar la contraseña que se encuentra en esta misma página hará lo sgte.
*/
if (isset($_POST['codigo'])) {

	/**
	 * Se crea la variable $correo que almacena el campo que tiene como nombre 'email',
 	 * el cual se envia del formulario de este mismo archivo
	 * 
	 * @var string $correo		Correo del usuario que va a recuperar clave, tipo cadena de caracteres
	 */
	 $correo_usuario = $_POST['correo_usuario'];

	/**
	 * Se crea la variable $idrol que almacena el campo que tiene como nombre 'idrol',
	 * el cual se envia del formulario de este mismo archivo
	 * 
	 *Rol del usuario que va a recuperar clave, tipo cadena de caracteres
	 */ 
	 $idrol = $_POST['idrol'];

	/**
     * 
     * Si la variable $rol es igual a user 
     */
	if ($idrol == '1') {

		/**
		 * Consulta a la tabla administrador para traer toda la información del administrador
		 */
		$administrador = mysqli_query($conn, "SELECT * FROM `tbl_usuarios` where `correo_usuario` = '$correo_usuario' and `idrol` = '1'");

		/**
		 * Si encuentra un resultado entonces hace lo sgte.
		 */
		if (mysqli_num_rows($administrador) == 1) {

            $query="UPDATE `tbl_usuarios` set `TOKEN` = '1' where `correo_usuario` = '$correo_usuario' ";
            $re= $conn->query($query);
            if(!$re){
                echo "<script>alert('Los datos son incorrectos, por favor revise e intente nuevamente');</script>";
                echo "<script>window.location='../vistas/index.php';</script>";
            }

			/**
             * En $codigo se almacena el resultado de la consulta $administrador
             */
			$codigo = mysqli_fetch_array($administrador);

			/**
			 * Se crea la variable $ruta que almacena la ubicación del archivo que se le envía al usuario 
			 * para cambiar su clave, el cual contiene el numero de documento del administrador, para el cual 
			 * realizan el llamado a $codigo que es quién almacena los resultados de la consulta $administrador
			 * 
			 * @var string $ruta		Ruta del archivo para cambiar la clave, tipo cadena de caracteres
			 */
            $ruta = 'localhost/final/nuevacontraseña.php?codigo=' .  $codigo['idusuario'];

			/**
			 * Se crea la variable $mensaje que almacena un link con la ruta que dice para cambiar
			 * tu contraseña da click aquí
			 */
			$mensaje = "<a href='$ruta'>Para recuperar tu contraseña da click aquí</a>";
				/**
 	 * Se inicializa la librería PHPMailer para el envío de los correos
 	 */
	$mail = new PHPMailer\PHPMailer\PHPMailer();
	$mail->isSMTP();
	/*
	Enable SMTP debugging
	0 = off (for production use)
	1 = client messages
	2 = client and server messages
	*/

	/**
 	 * Todas estas variables vienen por defecto en la librería y almacenan tanto los puertos como los 
 	 * host de gmail
 	 */
	$mail->SMTPDebug = 0;
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;

	/**
     * Correo y contraseña del correo electrónico del emisor
     */
    $mail->Username   = 'orlandocabrera10141995@gmail.com';                     // SMTP username
    $mail->Password   = 'Juniortupapa1014';                               // SMTP password

	/**
 	 * Nombre y correo de contacto que recibe el receptor
 	 */
      $mail->setFrom('orlandocabrera10141995@gmail.com', 'SGCIR');

	/**
	 * Correo del receptor
	 */
	$mail->addAddress($correo_usuario);

	/**
	 * Asunto del correo
	 */
	$mail->Subject = "Recuperar contraseña - SGCIR";

	/**
	 * Cuerpo del correo, el cual contiene el mensaje que le llega al usuario
	 */
	$mail->Body = 'Estimado(a) usuario, debido a que solicitó recuperar su contraseña, a continuación
		se encuentra el link para que pueda recuperar su contraseña. ' . '<br>' . '<br>'
		. $mensaje . '<br>' . '<br>'
		. 'Cordialmente' . '<br>'
	 	. 'El equipo de sgcir. ';
	$mail->CharSet = 'UTF-8'; // Con esto funcionan los acentos
	$mail->IsHTML(true);

	/**
	 * 
	 * Si el correo no se envía, se imprime una alerta de error
	 */
	if (!$mail->send()) {
		echo "Error al enviar el Email: " . $mail->ErrorInfo;

	} 
	/**
	 * De lo contrario
	 */
	else {
		/**
		 * Si el correo se envía, se imprime una alerta de que se envió correctamente
		 */
		echo "<script type='text/javascript'>alert('Email enviado correctamente');</script>";
		echo "<script>window.location='../index.php';</script>";
	}
		} 
		/**
		 * De lo contrario 
		 */
		else {

			/**
			 * Si no encuentra resultados, se imprime una alerta y se mantiene en el inicio de sesión
			 */
			echo "<script>alert('Los datos son incorrectos, por favor revise e intente nuevamente');</script>";
			echo "<script>window.location='../recuperar.php';</script>";
		}
	}

	/**
     * 
     * Si la variable $rol es igual a admin 
     */
	if ($idrol == '2') {

		/**
		 * Consulta a la tabla cliente para traer toda la información del $inspector
		 */
		$inspector = mysqli_query($conn, "SELECT * FROM `tbl_usuarios` where `correo_usuario` = '$correo_usuario'");

		/**
		 * Si encuentra un resultado entonces hace lo sgte.
		 */
		if (mysqli_num_rows($inspector) == 1) {
            
            $query="UPDATE `tbl_usuarios` set `TOKEN` = '1' where `correo_usuario` = '$correo_usuario' ";
            $re= $conn->query($query);
            if(!$re){
                echo "<script>alert('Los datos son incorrectos, por favor revise e intente nuevamente');</script>";
                echo "<script>window.location='../vistas/index.php';</script>";
            }

			/**
             * En $codigoA se almacena el resultado de la consulta $inspector
             */
			$codigoA = mysqli_fetch_array($inspector);

			/**
			 * Se crea la variable $ruta que almacena la ubicación del archivo que se le envía al usuario 
			 * para cambiar su clave, el cual contiene el numero de documento del inspector, para el cual 
			 * realizan el llamado a $codigoA que es quién almacena los resultados de la consulta $inspector
			 * 
			 * @var string $ruta		Ruta del archivo para cambiar la clave, tipo cadena de caracteres
			 */
			$ruta = 'localhost/final/nuevacontraseña.php?codigo=' .  $codigoA['idusuario'];

			/**
			 * Se crea la variable $mensaje que almacena un link con la ruta que dice para cambiar
			 * tu contraseña da click aquí
			 */
			$mensaje = "<a href='$ruta'>Para recuperar tu contraseña da click aquí</a>";
				/**
 	 * Se inicializa la librería PHPMailer para el envío de los correos
 	 */
	$mail = new PHPMailer\PHPMailer\PHPMailer();
	$mail->isSMTP();
	/*
	Enable SMTP debugging
	0 = off (for production use)
	1 = client messages
	2 = client and server messages
	*/

	/**
 	 * Todas estas variables vienen por defecto en la librería y almacenan tanto los puertos como los 
 	 * host de gmail
 	 */
	$mail->SMTPDebug = 0;
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;

	/**
     * Correo y contraseña del correo electrónico del emisor
     */
    $mail->Username   = 'orlandocabrera10141995@gmail.com';                     // SMTP username
    $mail->Password   = 'Juniortupapa1014';                               // SMTP password

	/**
 	 * Nombre y correo de contacto que recibe el receptor
 	 */
      $mail->setFrom('orlandocabrera10141995@gmail.com', 'SGCIR');

	/**
	 * Correo del receptor
	 */
	$mail->addAddress($correo_usuario);

	/**
	 * Asunto del correo
	 */
	$mail->Subject = "Recuperar contraseña - SGCIR";

	/**
	 * Cuerpo del correo, el cual contiene el mensaje que le llega al usuario
	 */
	$mail->Body = 'Estimado(a) usuario, debido a que solicitó recuperar su contraseña, a continuación
		se encuentra el link para que pueda recuperar su contraseña. ' . '<br>' . '<br>'
		. $mensaje . '<br>' . '<br>'
		. 'Cordialmente' . '<br>'
	 	. 'El equipo de sgcir. ';
	$mail->CharSet = 'UTF-8'; // Con esto funcionan los acentos
	$mail->IsHTML(true);

	/**
	 * 
	 * Si el correo no se envía, se imprime una alerta de error
	 */
	if (!$mail->send()) {
		echo "Error al enviar el Email: " . $mail->ErrorInfo;

	} 
	/**
	 * De lo contrario
	 */
	else {
		/**
		 * Si el correo se envía, se imprime una alerta de que se envió correctamente
		 */
		echo "<script type='text/javascript'>alert('Email enviado correctamente');</script>";
		echo "<script>window.location='../index.php';</script>";
	}
		} 
		/**
		 * De lo contrario
		 */
		else {

			/**
			 * Si no encuentra resultados, se imprime una alerta y se mantiene en el inicio de sesión
			 */
			echo "<script>alert('Los datos son incorrectos, por favor revise e intente nuevamente');</script>";
			echo "<script>window.location='../recuperar.php';</script>";
		}
	}


}
?>

</body>

</html>