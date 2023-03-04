<?php

include 'model/conexion.php';


$id=$_POST['txt3Id'];
$archivo=$_FILES['imagen']['name'];
$imagen=$_FILES['imagen']['tmp_name'];

$ruta='images/'.$archivo;


move_uploaded_file($imagen, $ruta);

$sentence=$database->prepare('UPDATE articulos SET imagen=? WHERE id=?');
$result=$sentence->execute([$ruta,$id]);

if ($result) {
	// code...
	header('location: editar.php?id='.$id);
}else{
	echo 'casi';
}

?>