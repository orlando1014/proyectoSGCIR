<?php

//aqui creamos la clase llamada Conexion
 class Conexion{
 	//creamos una funcion llamada conectar 
   public function conectar(){
   	// en la cual creamos una variable $conexion en la cual se le asigna una ruta al PDO
       $conexion= new PDO("mysql:host=localhost;dbname=sgcir;charset=utf8","root","");
       //("mysql:host=localhost;dbname=sgcir;charset=utf8","root",""); como se observa , para establecer la conexion a la base de datos
       return $conexion;
   }
 }
 
//1
 ?>