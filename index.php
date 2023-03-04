<?php
session_start();
include 'model/conexion.php';

if (isset($_SESSION['rol'])) {
	// code...
	switch ($_SESSION['rol']) {
		case 1:
			// code...
			header('location:indexadmin.php');
			break;
		
		case 2:
			// code...
			header('location:indexoper.php');
			break;
		
		default:
			// code...
			
	}
}

if (isset($_POST['usuario']) && isset($_POST['password'])) {
	
	$usuario=$_POST['usuario'];
	$password=$_POST['password'];

	$sentence=$database->prepare('SELECT*FROM usuarios WHERE usuario=? AND password=?');
	$result=$sentence->execute([$usuario,$password]);

	$validar=$sentence->fetch(PDO::FETCH_NUM);

	$rol=$validar[3];

	$_SESSION['rol']=$rol;

	switch ($rol) {
		case 1:
			// code...
			header('location:indexadmin.php');
			break;
		
		case 2:
			// code...
			header('location:indexoper.php');
			break;
		
		default:
			// code...
			
	}

	
}


function randomColor(){
 $str = "#";
 for($i = 0 ; $i < 6 ; $i++){
 $randNum = rand(0, 15);
 switch ($randNum) {
 case 10: $randNum = "A"; 
 break;
 case 11: $randNum = "B"; 
 break;
 case 12: $randNum = "C"; 
 break;
 case 13: $randNum = "D"; 
 break;
 case 14: $randNum = "E"; 
 break;
 case 15: $randNum = "F"; 
 break; 
 }
 $str .= $randNum;
 }
 return $str;
}

$color1=randomcolor();
$color2=randomcolor();
$color3=randomcolor();
$color4=randomcolor();
$color5=randomcolor();
$color6=randomcolor();
$color7=randomcolor();
$color8=randomcolor();
$color9=randomcolor();
$color10=randomcolor();
$color11=randomcolor();

?>


<!DOCTYPE html>
<html>
<head>
	<style> body{ font-family:sans-serif; } 
	.form-control-lg{
		background: linear-gradient(slateblue,lightcoral);
		background-size: 400% 400%;
		transition: 0.5s;
          border: none;
          color: lightcyan;
          font-weight: bold;
          outline: none;

        }
        
       
        .hover:hover .form-control-lg{
        	background-position: 100%;

        }

        .form-control-lg2{
		background: linear-gradient(darkseagreen,orange);
		background-size: 400% 400%;
		transition: 0.5s;
          border: none;
          color: seashell;
          font-weight: bold;
          outline: none;

        }
        
       
        .hover:hover .form-control-lg2{
        	background-position: 100%;

        }

</style>
	<meta charset="utf-8">
	<title>Input</title>
</head>
<body>
	<center>
		<div style="cursor: pointer;" onclick="location.href='index.php';">

		<table cellpadding="10"><tr>
			<td style="color: <?=$color1?>;font-weight: bold;font-size: 80px;">J</td>
			<td style="color: <?=$color2?>;font-weight: bold;font-size: 80px;">O</td>
			<td style="color: <?=$color3?>;font-weight: bold;font-size: 80px;">G</td>
			<td style="color: <?=$color4?>;font-weight: bold;font-size: 80px;">A</td>
			<td style="color: <?=$color5?>;font-weight: bold;font-size: 80px;"> </td>
			<td style="color: <?=$color6?>;font-weight: bold;font-size: 80px;">B</td>
			<td style="color: <?=$color7?>;font-weight: bold;font-size: 80px;">O</td>
			<td style="color: <?=$color8?>;font-weight: bold;font-size: 80px;">N</td>
			<td style="color: <?=$color9?>;font-weight: bold;font-size: 80px;">I</td>
			<td style="color: <?=$color10?>;font-weight: bold;font-size: 80px;">T</td>
			<td style="color: <?=$color11?>;font-weight: bold;font-size: 80px;">O</td>
		</tr></table>
	</div>
	<br><br><br>

	<center>
		<h1>Inicio de sesión</h1>
		<br><br><br>
	<form method="POST" autocomplete="off">
		<h2>Usuario:</h2>
		<div class="hover"><input type="text" name="usuario" class="form-control-lg border-0"></td><br><br><div>
		<h2>Password:</h2>
		<div class="hover"><input type="text" name="password" class="form-control-lg2 border-0"></div><br><br><br>
		<input type="submit" value="Ingresar">
	</form>

</center>

</body>
</html>