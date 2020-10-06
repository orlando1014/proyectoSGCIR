<?php

require_once "conexion.php";

//extends es heredar en este caso estamos heredando a conexion 

class Cuestionario extends Conexion{

//En caso no se halla creado cuestuonario generamos una una número correlativo
	public function GenerarNumeroLista(){
	    $sql="select count(*) as 'cantidad' from tbl_cuestionarios";

		$query=Conexion::conectar()->prepare($sql); //prepara mi query
		//$query->bindParam(":idusuario",$idusuario, PDO::PARAM_INT);
		$query->execute();

	    return $query->fetch();// con esto se hace para que regrese una fila
	    $query->close(); // aqui cerramos la conexion
	}

//Ahora validamos si existe un cuestionario activo
	public function ObtenerDatosCuestionario($idusuario){
	    $sql="select * from tbl_cuestionarios where idusuario=:idusuario and terminado = 'NO'";

		$query=Conexion::conectar()->prepare($sql); //prepara mi query
		$query->bindParam(":idusuario",$idusuario, PDO::PARAM_INT);
		$query->execute();

	    return $query->fetch();// con esto se hace para que regrese una fila
	    $query->close(); // aqui cerramos la conexion
	}

	/**
	 * Aqui registramos un cuestionario con la funcion Registrar Cuestionario
	 * @param String, int  $datos    (:nombreproyecto,:ubicacion,:fechaelaboracion,:listaverificacion,:idusuario,:terminado)";
	 * @return void
	 */
	public function RegistrarCuestionario($datos){
	  	$sql="insert into tbl_cuestionarios values (null,:nombreproyecto,:ubicacion,:fechaelaboracion,:listaverificacion,:idusuario,:terminado)";

	 	$query=Conexion::conectar()->prepare($sql); //prepara mi query
		$query->bindParam(":nombreproyecto", $datos["nombreproyecto"], PDO::PARAM_STR);
		$query->bindParam(":ubicacion", $datos["ubicacion"], PDO::PARAM_STR);
		$query->bindParam(":fechaelaboracion", $datos["fechaelaboracion"], PDO::PARAM_STR);
		$query->bindParam(":listaverificacion", $datos["listaverificacion"], PDO::PARAM_STR);
		$query->bindParam(":idusuario", $datos["idusuario"], PDO::PARAM_INT);
		$query->bindParam(":terminado", $datos["terminado"], PDO::PARAM_STR);

		return $query->execute();
		$query->close(); // aqui cerramos la conexion

	}
	/**
	 * Aqui Editamos un cuestionario con la funcion Editar Cuestionario
	 * @param String, int  $datos  (:nombreproyecto,:ubicacion)";
	 * @return void
	 */
	public function EditarCuestionario($datos){
	  	$sql="update tbl_cuestionarios set 
	  				nombreproyecto = :nombreproyecto,
					  ubicacion = :ubicacion
			where idusuario=:idusuario and terminado = 'NO'";

	 	$query=Conexion::conectar()->prepare($sql); //prepara mi query
		$query->bindParam(":nombreproyecto", $datos["nombreproyecto"], PDO::PARAM_STR);
		$query->bindParam(":ubicacion", $datos["ubicacion"], PDO::PARAM_STR);
		$query->bindParam(":idusuario", $datos["idusuario"], PDO::PARAM_INT);

		return $query->execute();
		$query->close(); // aqui cerramos la conexion

	}
	/**
	 * Aqui Finalizamos un cuestionario con la funcion Finalizar Cuestionario
	 * @param  $idusuario 
	 * @return void
	 */
	public function FinalizarCuestionario($idusuario){
	  	$sql="update tbl_cuestionarios set 
				terminado = 'SI'
			WHERE idusuario = :idusuario and terminado = 'NO'";

	 	$query=Conexion::conectar()->prepare($sql); //prepara mi query
		$query->bindParam(":idusuario", $idusuario, PDO::PARAM_INT);

		return $query->execute();
		$query->close(); // aqui cerramos la conexion

	}
}
?>