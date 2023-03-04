<?php

include 'model/conexion.php';

$id=$_GET['id'];
$sentence=$database->prepare('DELETE FROM articulos WHERE id=?');
$result=$sentence->execute([$id]);

if ($result) {
	// code...
	header('location: index.php');
}else{
	echo 'casi';
}

?>