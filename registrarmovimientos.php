<?php

include 'model/conexion.php';

$id=$_POST['txt3Id'];

$entradas1=$_POST['txt3Entradas'];
$salidas1=$_POST['txt3Salidas'];

$entradas2=$_POST['txt2Entradas'];
$salidas2=$_POST['txt2Salidas'];

$entradas=$entradas1+$entradas2;
$salidas=($salidas1+$salidas2);




$valore=$_POST['valore'];
$valore2=$_POST['valore2'];

$valors=$_POST['valors'];
$valors2=$_POST['valors2'];

$valing=$valore+$valore2;
$valegr=$valors+$valors2;


$sentence=$database->prepare('UPDATE articulos SET entradas=?,salidas=?,valing=?,valegr=? WHERE id=?');
$result=$sentence->execute([$entradas,$salidas,$valing,$valegr,$id]);

if ($result) {
	// code...
	header('location:editar.php?id='.$id);
}else{
	echo 'non';
}

?>

