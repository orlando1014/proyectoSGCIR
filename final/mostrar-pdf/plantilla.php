<?php
include 'conexiondb/conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>documento-pdf</title>
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scalen=1.0">
</head>
<body>
    <?php
    $id=5;
    $coninne1="SELECT * FROM `tbl_cuestionarios` INNER JOIN `tbl_usuarios` ON `tbl_cuestionarios`.`idusuario`=`tbl_usuarios`.`idusuario`  WHERE `idcuestionario` = '4'";
    $resinne1=$conn->query($coninne1);

    while($row= $resinne1->fetch_assoc()){
    ?>
<center>
    <div class="container">
        
        <div class="espacio"></div>
        
        <div class="tittle">
            <div class="logo">
                <img id="logo" src="../estilos/img/logo.png" height="100%" width="100%" >
            </div>
            <div class="titulo">
                <h1 id="titu">Inspecciones </h1>
            </div>
            <div class="fecha">
                <h2 id="fecha"><?php echo$row['fechaelaboracion']   ?></h2>
            </div>
        </div>

        <div class="espacio">
        
        </div>
        <div class="informacion">
            <div class="info-pro">
                <div class="nom-pro">
                    <h2 id="h2">Nombre proyecto: </h2>
                    <h3 id="h3"><?php echo$row['nombreproyecto'] ?></h3>
                </div>
                <div class="direc-pro">
                    <h2 id="h2">Dirección:</h2> 
                    <h3 id="h3"><?php echo$row['ubicacion'] ?></h3>
                    
                </div>
            </div>
            <div class="info-insp">
                <div class="inspec">
                    <h2 id="h2">Nombre inspector: </h2>
                    <h3 id="h3"><?php echo$row['nombre_usuario'] ?></h3>
                </div>
                <div class="doc">
                    <h2 id="h2">Documento: </h2>
                    <h3 id="h3"> <?php  echo$row['cedula_usuario'] ?></h3>
                </div>
            </div>
        </div>
        <?php
    }
        ?>
        <div class="espacio"></div>
        <?php
            $consult2= "SELECT * FROM `tbl_preguntas` WHERE `idcuestionario` = '$id'";
            $result2= $conn->query($consult2);
            while($row=$result2->fetch_assoc()){
        ?>

        <div class="pregunta">
            <div class="num-pre">
            <h2 id="h2">Pregunta:    <?php echo$row['numero'] ?></h2>
            </div>
            <div class="cate-pre">
            <h3 id="h3"><?php  echo$row['categoria'] ?></h3>
            </div>
            <div class="preg">
            <h2 id="h2">Pregunta: </h2>
            <h3 id="h3"><?php echo$row['pregunta'] ?></h3>
            </div>
            <div class="res-pre">
            <h2 id="h2" > Respuesta: </h2>
            <h3 id="h3"><?php echo$row['respuesta'] ?></h3>
            </div>
            <br>
            <div class="obs-pre">
            <h2 id="h2" >  Observación: </h2>
            <h3 id="h3"><?php echo$row['observacion'] ?></h3>

            </div>
            <div class="evidencia">
            <h2 id="h2" > Evidencia: </h2>
            <h3 id="h3"><?php echo$row['imagen'] ?></h3>

            </div>
        </div>

    <?php
            }
    ?>
    </div>
    </center>
</body>
</html>