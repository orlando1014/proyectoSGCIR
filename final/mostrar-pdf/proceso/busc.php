<!DOCTYPE html>
<?php 

  session_start();

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inspecciones</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</head>
<!-- <h3>Welcome: <?php echo $_SESSION['nombre_usuario'];?></h3> -->
<body>
<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand"></a>
</nav>
 
  <table class="table">
    <thead class="thead-dark">
          <tr>
            <th scope="col">id</th>
            <th scope="col">Nombre proyecto</th>
            <th scope="col">Fecha</th>
            <th scope="col">lista de verificacion</th>
            <th scope="col">Abrir</th>

          </tr>
        </thead>
      <?php
      include "../conexiondb/conn.php";


      $ins = $_SESSION['nombre_usuario'];

      $bins="SELECT * From `tbl_usuarios` where `nombre_usuario` = '$ins' ";
      $res= $conn->query($bins);
      if(!$bins){
        echo"no funciona";
    }
      while($row = $res->fetch_assoc()){
          $idins= $row['idusuario'];
      }
    $mos = "SELECT * FROM `tbl_cuestionarios` WHERE `idusuario` = '$idins' ";
      $result= $conn->query($mos);
      if(!$mos){
          echo"no funciona";
      }
        while($row = $result->fetch_assoc()){

      ?>

        <tr>
          <th scope="row"><?php echo$row['idcuestionario']?></th>
          <td><?php echo$row['nombreproyecto']?></td>
          <td><?php echo$row['fechaelaboracion']?></td>
          <td><?php echo$row['listaverificacion']?></td>
          <td><a href="../pdf.php?idcuestionario=<?php echo$row['idcuestionario'];?>">Abrir</a></td>
          </tr>

          <?php
      }
          ?> 
        </tbody>
      </table>
      <center>
<a class="btn btn-dark" href="../../vistas/inspector/index.php" role="button">atras</a>
</center>
</body>
</html>