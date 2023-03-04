<?php

include 'model/conexion.php';

$id=$_POST['txt2Id'];
$nombre=$_POST['txt2Nombre'];
$categoria=$_POST['txt2Categoria'];
$entradas=$_POST['txt2Entradas'];
$salidas=$_POST['txt2Salidas'];

$sentence=$database->prepare('UPDATE articulos SET nombre=?,categoria=?,entradas=?,salidas=? WHERE id=?');
$result=$sentence->execute([$nombre,$categoria,$entradas,$salidas,$id]);

if ($result) {
	// code...
	header('location: index.php');
}else{
	echo 'casi';
}

?>