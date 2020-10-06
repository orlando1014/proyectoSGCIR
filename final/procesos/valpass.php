<?php
include "../mostrar-pdf/conexiondb/conn.php";


$cont = sha1($_POST['clave']);
$cont1 = sha1($_POST['clave2']);

//recibimos el id y las contraseñas ingresadas
    $id=$_REQUEST['codigo'];
    $pass = $cont;
    $pass2 = $cont1;


//validamos q las contraseña sean iguales

if($pass==$pass2){
    //consultamos q usuario esta intentando hacer el cambio de contraseña y verificamos si su token aun esta bijente
    $cons2="SELECT * from `tbl_usuarios` where `idusuario`='$id' ";
    $resp=$conn->query($cons2);

    if (!$resp) {
        echo"ha abido u error un error";
    }while( $row = $resp->fetch_assoc()){
        $tok=$row['TOKEN'];
    }
// si el token es mayor a cero quiere decir que no a utilizado el cambio de contraseña y pasara a actualizar la contraseña y el token  
    if($tok>0){
    
    $query="UPDATE `tbl_usuarios` set `clave_usuario`= '$pass2', `TOKEN` = '0'  where `TOKEN` = '1' and `idusuario`='$id' ";
    $res= $conn->query($query);

    if($res){
        echo "<script>alert('El cambio de contraseña ha sido exitoso,, ya puedes acceder al sistema');</script>";
    
        echo "<script>window.location='../index.php';</script>";

    }
    // si el token no es mayor a cero quiere decir que ya se a utilizado el cambio de contraseña y le mostrara una alerta y lo sacara de
  }else{
    echo "<script>alert('el cambio de contraseña ya se efectuo, por favor revise e intente nuevamente');</script>";
                echo "<script>window.location='../recuperar.php';</script>";
  }

}
//si las contraseñas ingresadas no coinciden le mostrara una alerta y lo redigira para q vuelba a ingresar las claves
else{
    echo "<script>alert('Las contraseñas no coinciden , por favor revise e intente nuevamente');</script>";

    echo "<script>window.location=\"../nuevacontraseña.php?codigo={$id}\"</script>";
}

