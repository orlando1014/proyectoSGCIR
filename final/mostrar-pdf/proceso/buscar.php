<?php

     session_start();
     if(($_SESSION['administrador']) !=''){

         }else {
           header('Location: ../../index.php');
         }


?>
<!DOCTYPE html>
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
<body>
<?php include('header.php'); ?>
<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand"></a>
  <form class="form-inline" method="post" action="../../mostrar-pdf/proceso/buscar.php">
    <input class="form-control mr-sm-2"  name="buscar" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
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
      if(isset( $_POST['buscar'])){
        $bus = $_POST['buscar'];
      }else{
        $bus = '';
      }
      
      
      $buscar= "SELECT * FROM `tbl_cuestionarios` WHERE `idcuestionario` LIKE '%$bus%' 
      OR `nombreproyecto` LIKE '%$bus%' OR `fechaelaboracion` LIKE '%$bus%'
      OR `listaverificacion` LIKE '%$bus%' ";
      $result= $conn->query($buscar);
      if(!$buscar){
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
<!-- <a class="btn btn-dark" href="../../vistas/administrador/index.php" role="button">atras</a> -->
</center>
</body>
</html>