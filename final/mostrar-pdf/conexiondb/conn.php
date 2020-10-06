<?php

//aqui creamos una conexion con la bd
$conn= new mysqli("localhost","root","","sgcir");
// $conn-> set_charset("utf8");
if(!$conn){
    echo"conexion mala";
}
