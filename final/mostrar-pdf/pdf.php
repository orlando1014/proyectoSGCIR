<?php

require('fpdf/fpdf.php');

$libreria = new FPDF;

class PDF extends FPDF
{
// Cabecera de página
function Header()
{

   $this->Image('../estilos/img/logo.png', 180, 5, 20, 20,'png');
    // Arial bold 15
    $this->SetFont('Arial','B',25);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
   //  $this->Cell(35,10,'inspecciones',0,0,'C');
    // Salto de línea
    $this->Ln(30);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}


//aqui llamamos la conexion ya realizada
include 'conexiondb/conn.php';

//aqui estamos obteniendo el id del cuestionario para traer solo los datos q coincidan con este id
$id=$_REQUEST['idcuestionario'];

//consulta inner join de donde estamos extrayendo los datos de la tabla de usuario y cuestionarios
$coninne1="SELECT * FROM `tbl_cuestionarios` INNER JOIN `tbl_usuarios` ON `tbl_cuestionarios`.`idusuario`=`tbl_usuarios`.`idusuario`  WHERE `idcuestionario` = '$id'";
$resinne1=$conn->query($coninne1);


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',16);
$pdf->AddPage('PORTRAIT','Letter');


//aquí estamos mostrando lod datos de la consulta del inner join
while($row = $resinne1->fetch_assoc()){

$pdf->cell(45, 10, 'INSPECCIONES', 0, 0, 'c',0 );
$pdf->SetX(152);
$pdf->cell(35, 10, $row['fechaelaboracion'], 0, 1, 'L' );
$pdf->cell(35, 10, '', 0, 1, 'R' );
$pdf->cell(100,10,'Nombre proyecto:',0,0,'c');
$pdf->SetX(152);
$pdf->cell(70, 10, $row['nombreproyecto'], 1, 1,'L');
$pdf->cell(35, 5, '', 0, 1, 'R' );

$pdf->cell(50,10,utf8_decode('Ubicación:'),0,0,'c');
$pdf->SetX(152);
$pdf->cell(60, 10, $row['ubicacion'], 1, 1, 'L');
$pdf->cell(35, 10, '', 0, 1, 'R' );

}

$coninne1="SELECT * FROM `tbl_cuestionarios` INNER JOIN `tbl_usuarios` ON `tbl_cuestionarios`.`idusuario`=`tbl_usuarios`.`idusuario`  WHERE `idcuestionario` = '$id'";
$resinne1=$conn->query($coninne1);
while($row = $resinne1->fetch_assoc()){
$pdf->cell(35, 10, 'Realizado por:', 0, 0, 'c' );
$pdf->SetX(152);
$pdf->cell(35, 10, 'numero documento:', 0, 1, 'c' );
$pdf->cell(90, 10, $row['nombre_usuario'],1,0,'L');
$pdf->SetX(152);
$pdf->cell(45, 10, $row['cedula_usuario'],1,1,'c');}
$pdf->cell(35, 10, '', 0, 1, 'R' );

  
    $consult1= "SELECT * FROM `tbl_preguntas` WHERE `idcuestionario` = '$id' ";
    $result1= $conn->query($consult1);

 while($row = $result1->fetch_assoc()){

    
   

    $pdf->cell(100, 10, $row['categoria'],0,1,'c');
    $pdf->cell(40,10,'Pregunta :',0,0,'c');
    $pdf->cell(10, 10, $row['numero'],0,1,'c');
     $pdf->Multicell(195, 10, $row['pregunta'],0,'c',0);
     $pdf->cell(35, 5, '', 0, 1, 'R' );

     $pdf->cell(100,10,'Respuesta:',0,1,'c');
     $pdf->cell(20, 10, $row['respuesta'],0,1,'c');
     $pdf->cell(35, 5, '', 0, 1, 'R' );

     $pdf->cell(100,10,'Observacion:',0,1,'c');
     $pdf->Multicell(100, 10, $row['observacion'],0,'c',0);
     $pdf->cell(35, 5, '', 0, 1, 'R' );

     $pdf->cell(100,10,'evidencia:',0,0,'c');
     if($row['nombreimagen']!= null || $row['nombreimagen'] != ""){
        $path = "../images/".$row['nombreimagen'].".jpeg";
        $pdf->Multicell(10,11, $pdf->Image($path, $pdf->GetX(), $pdf->GetY(),22),10);
    }
    else{
        $path = "No hay imagen";
        $pdf->Multicell(100, 10,$path ,0,'c',0);
    }
     
     //$pdf->Multicell(100, 10, ,0,'c',0);
     //$libreria->Image('../estilos/img/logo.png', 180, 5, 20, 20,'png');
     $pdf->Ln(125); 

     }

     $pdf->Output();

?>