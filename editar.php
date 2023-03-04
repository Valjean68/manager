<?php

session_start();

include 'model/conexion.php';

$id=$_GET['id'];

$sentence=$database->prepare('SELECT*FROM articulos WHERE id=?');
$result=$sentence->execute([$id]);

$item=$sentence->fetch(PDO::FETCH_OBJ);


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


	
			if($item->salidas*2 <= $item->entradas) {
    			$color = 'darkred';
    		}else{
    			$color='forestgreen';
    		}

?>

<!DOCTYPE html>
<html>
<head>
	<style> body{ font-family:sans-serif; } 
	.form-control-lg{
		background: steelblue;
          border: none;
          color: lightcyan;
          font-weight: bold
        }
        .form-control-lg:hover{
        	transition-duration: 0.5s;
          background: lightcoral;
          outline: none;
        }
        .form-control-lg:focus{
          background: lightcoral;
          outline: none;
        }

</style>
	<meta charset="utf-8">
	<title>Étoile-Fetcher: Modificar elemento</title>
</head>
<body>
	<div style="overflow: hidden;padding: 2%;">
	<div style="float:left;cursor: pointer;" onclick="location.href='index.php';"><h2>Bienvenido</h2></div>
	<div style="float: right;cursor: pointer;" onclick="location.href='destroy.php';"><h2>Cerrar Sesión</h2></div>
	</div>
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


	<br><br>
	<h1 style="color: <?=$color5?>;font-weight: bold;font-size: 40px;"><?php echo $item->nombre ?></h1>

	<img src='<?php echo $item->imagen ?>' width=200>
	
<video src="<?php echo $item->imagen ?>" autoplay muted loop></video>
	<br>
	<br>
	<h1>Última imagen actualizada</h1>


		<form method="POST" action="imagenproceso.php?id=<?php $id ?>" enctype="multipart/form-data">
			
			<input type="file" name="imagen" value="Actualizar Imagen"><br>
			<input type="submit" value="Actualizar Imagen"><br>
			<input type="hidden" name="txt3Id" value="<?php echo $item->id ?>">
		</form>
		

		
	


	<br>
	<br>

		<h1>Registrar movimientos</h1>
		<form method="POST" action="registrarmovimientos.php">
			<table>
				
				<tr>
					<td>Mercadería ingresada por unidades: </td>
					<td><input type="text" name="txt3Entradas" class="form-control-lg border-0" value="<?php echo '0'?>"></td>
				</tr>


				<tr>
					<td>Valor de la mercaderia ingresada: </td>
					<td><input type="text" name="valore" class="form-control-lg border-0" value="<?php echo '0' ?>"></td>
				</tr>
				<tr>
					
					<td><input type="hidden" name="valore2" class="form-control-lg border-0" value="<?php echo $item->valing ?>"></td>
				</tr>
				<tr><td> </td></tr><tr><td> </td></tr><tr><td> </td></tr><tr><td> </td></tr>

				<tr>
					<td>Mercadería vendida por unidades: </td>
					<td><input type="text" name="txt3Salidas" class="form-control-lg border-0" value="<?php echo '0' ?>"></td>
				</tr>

				<tr>
					<td>Valor por la mercaderia vendida: </td>
					<td><input type="text" name="valors" class="form-control-lg border-0" value="<?php echo '0' ?>"></td>
				</tr>
				<tr>
					
					<td><input type="hidden" name="valors2" class="form-control-lg border-0" value="<?php echo $item->valegr ?>"></td>
				</tr>
				<tr><td> </td></tr><tr><td> </td></tr><tr><td> </td></tr><tr><td> </td></tr>

				<tr>
					<td>Saldo actual: </td>
					<td><input type="text" name="txt2Salidas" style="background: lightsteelblue;color: <?=$color?>;font-weight: bold;" value="<?php echo ($item->valegr-$item->valing) ?>" disabled></td>
				</tr>

				

				<tr>
					
					<td><input type="hidden" name="txt2Entradas" class="form-control-lg border-0" value="<?php echo $item->entradas ?>"></td>
				</tr>
				<tr>
					
					<td><input type="hidden" name="txt2Salidas" class="form-control-lg border-0" value="<?php echo $item->salidas ?>"></td>
				</tr>
				<tr>
					<td><input type="hidden" name="txt3Id" value="<?php echo $item->id ?>"></td>
				</tr>
				<tr>
					<td><input type="submit" value="Registrar Movimientos"></td>
				</tr>
			</table>
		</form>
		<br>
		<br>
		<h1>Modifica elemento</h1>
		<form method="POST" action="editarproceso.php">
			<table>
				<tr>
					<td>Nombre artículo: </td>
					<td><input type="text" name="txt2Nombre" class="form-control-lg border-0" value="<?php echo $item->nombre ?>"></td>
				</tr>
				<tr>
					<td>Categoría: </td>
					<td><input type="text" name="txt2Categoria" class="form-control-lg border-0" value="<?php echo $item->categoria ?>"></td>
				</tr>
				<tr>
					<td>Ingresos: </td>
					<td><input type="text" name="txt2Entradas" class="form-control-lg border-0" value="<?php echo $item->entradas ?>"></td>
				</tr>
				<tr>
					<td>Egresos: </td>
					<td><input type="text" name="txt2Salidas" class="form-control-lg border-0" value="<?php echo $item->salidas ?>"></td>
				</tr>
				<tr>
					<td>Stock actualizado: </td>
					<td><input type="text" name="txt2Salidas" style="background: lightsteelblue;color: <?=$color?>;font-weight: bold;" value="<?php echo ($item->entradas-$item->salidas) ?>" disabled></td>
				</tr>
				<tr>
					<td><input type="hidden" name="txt2Id" value="<?php echo $item->id ?>"></td>
				</tr>
				<tr>
					<td><input type="submit" name="MODIFICAR"></td>
				</tr>
			</table>
		</form>
	</center>

</body>
</html>