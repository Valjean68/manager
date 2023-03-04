<?php

include 'model/conexion.php';

$nombre=$_POST['txtNombre'];
$categoria=$_POST['txtCategoria'];
$entradas=$_POST['txtEntradas'];
$salidas=$_POST['txtSalidas'];

$sentence=$database->prepare('INSERT INTO articulos (nombre,categoria,entradas,salidas) VALUES (?,?,?,?)');
$result=$sentence->execute([$nombre,$categoria,$entradas,$salidas]);

if ($result) {
	header('location:index.php');
}else{
	echo 'casi';
}

?>