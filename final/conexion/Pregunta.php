<?php
require_once "conexion.php";

//extends es heredar en este caso estamos heredando a conexion 

class Pregunta extends Conexion{

  //Ahora validamos si existe un cuestionario activo
	public function ObtenerPregunta($idusuario,$numero){
		$sql = "select tbl_pre.idpregunta,tbl_pre.idcuestionario,tbl_pre.numero,tbl_pre.pregunta,tbl_pre.categoria,tbl_pre.respuesta,tbl_pre.observacion,tbl_pre.imagen,tbl_pre.nombreimagen from tbl_preguntas tbl_pre
			inner join tbl_cuestionarios on tbl_cuestionarios.idcuestionario = tbl_pre.idcuestionario
			where tbl_cuestionarios.terminado = 'NO' and tbl_cuestionarios.idusuario = :idusuario  and tbl_pre.numero = :numero";

	    //$sql="SELECT idpregunta,pregunta FROM tbl_preguntas";
	    $query=Conexion::conectar()->prepare($sql); //prepara mi query
	    $query->bindParam(":idusuario",$idusuario, PDO::PARAM_INT);
	    $query->bindParam(":numero",$numero, PDO::PARAM_INT);
	    $query->execute();
		return $query->fetch();// con esto se hace para que regrese una fila
		$query->close(); // aqui cerramos la conexion 
	
	}

	public function RegistrarPregunta($datos){
	  	$sql="insert into tbl_preguntas values (null,:idcuestionario,:numero,:pregunta,:categoria,:respuesta,:observacion,:imagen,:nombreimagen)";

	 	$query=Conexion::conectar()->prepare($sql); //prepara mi query
		$query->bindParam(":idcuestionario", $datos["idcuestionario"], PDO::PARAM_INT);
		$query->bindParam(":numero", $datos["numero"], PDO::PARAM_INT);
		$query->bindParam(":pregunta", $datos["pregunta"], PDO::PARAM_STR);
		$query->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
		$query->bindParam(":respuesta", $datos["respuesta"], PDO::PARAM_STR);
		$query->bindParam(":observacion", $datos["observacion"], PDO::PARAM_STR);
		$query->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
		$query->bindParam(":nombreimagen", $datos["nombreimagen"], PDO::PARAM_STR);

		return $query->execute();
		$query->close(); // aqui cerramos la conexion

	}

	public function EditarPregunta($datos){
	  	$sql="update tbl_preguntas set 
	  				respuesta = :respuesta,
					  observacion = :observacion,
					  imagen = :imagen,
					  nombreimagen = :nombreimagen
			where idcuestionario=:idcuestionario and numero = :numero";

	 	$query=Conexion::conectar()->prepare($sql); //prepara mi query
		$query->bindParam(":respuesta", $datos["respuesta"], PDO::PARAM_STR);
		$query->bindParam(":observacion", $datos["observacion"], PDO::PARAM_STR);
		$query->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
		$query->bindParam(":nombreimagen", $datos["nombreimagen"], PDO::PARAM_STR);
		$query->bindParam(":idcuestionario", $datos["idcuestionario"], PDO::PARAM_INT);
		$query->bindParam(":numero", $datos["numero"], PDO::PARAM_INT);

		return $query->execute();
		$query->close(); // aqui cerramos la conexion

	}
}
?>