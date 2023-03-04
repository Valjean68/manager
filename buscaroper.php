<?php
session_start();

include 'model/conexion.php';

$nombre=$_POST['txtNombre'];
$categoria=$_POST['txtCategoria'];
$entradas=$_POST['txtEntradas'];
$salidas=$_POST['txtSalidas'];

$sentence=$database->prepare('SELECT*FROM articulos WHERE nombre=? OR categoria=? OR entradas=? OR salidas=?');
$result=$sentence->execute([$nombre,$categoria,$entradas,$salidas]);

$items=$sentence->fetchAll(PDO::FETCH_OBJ);

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

      

		.espacio{
		  border: none;
        }






        .scrolldown {
            width: 10%;
              
            /* border-collapse: collapse; */
            border-spacing: 0;
           
        }
          
        /* To display the block as level element */
        .scrolldown tbody, table.scrolldown thead {
            display: block;
        } 
          
        thead tr th {
           
        }
          
        .scrolldown tbody {
              
            /* Set the height of table body */
            height: 300px; 
              
            /* Set vertical scroll */
            overflow-y: auto;
              
            /* Hide the horizontal scroll */
            overflow-x: hidden; 
        }
          
        tbody { 
            
        }
          
        .scrolldown tbody td, thead th {
            width : 200px;
            
        }
        td {
            
        }



	 </style>
	<meta charset="utf-8">
	<title>Étoile-Fetcher: Stocks actuales</title>
</head>
<body>
	<div style="overflow: hidden;padding: 2%;">
	<div style="float:left;cursor: pointer;" onclick="location.href='index.php';"><h2>Bienvenido</h2></div>
	<div style="float: right;cursor: pointer;" onclick="location.href='destroy.php';"><h2>Cerrar Sesión</h2></div>
	</div>

	<center>
		<div style="cursor: pointer;" onclick="location.href='index.php';">
		<table cellpadding="10" class="jogabonito"><tr>
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

		<br>
		
		<br>
		<br>
		<h1>Stocks Actuales</h1>

		<br>
		<br>

		
		<table cellpadding="3" class="scrolldown">
			<thead>
			<tr>
				<th><h4 style="color: slateblue;">Artículo</h4></th>
				<th><h4 style="color: lightcoral;">Categoría</h4></th>
				<th><h4 style="color: darkorange;">Ingresos Totales</h4></th>
				<th><h4 style="color: olivedrab;">Egresos Totales</h4></th>
				<th><h4 style="color: indianred;">Stock Actual</h4></th>
				
				<th align="center"><h4 style="color: steelblue;">Editar</h4></th>
				

			</tr>
		</thead>
		<tbody>

			<tr><td> </td></tr>
			

			<?php

			foreach ($items as $item) {
				// code...

			
				
			if($item->salidas*2 <= $item->entradas) {
    			$color = 'darkred';
    		}else{
    			$color='forestgreen';
    		}

			?>

			<tr>
				<td><?php echo $item->nombre ?></td>
			
				<td><?php echo $item->categoria ?></td>
			
				<td align="center"><?php echo $item->entradas ?></td>
			
				<td align="center"><?php echo $item->salidas ?></td>
			
				<td align="center" style="color: <?=$color?>;font-weight: bold"><?php echo ($item->entradas-$item->salidas) ?></td>

				

				<td align="center"><a style="text-decoration: none" href="editar.php?id=<?php echo $item->id; ?>">✍</a></td>

				
			</tr>


			<?php
		}
		?>
		<tr><td> </td></tr>
		<tr><td> </td></tr>
	</tbody>
		<tr><td> </td></tr>
		<tr><td> </td></tr>

		<tr>

		<form method="POST" action="insertar.php" autocomplete="off">
			<td class="hover"><input type="text" class="form-control-lg border-0" name="txtNombre"></td>
			<td class="hover"><input type="text" class="form-control-lg border-0" name="txtCategoria"></td>
			<td class="hover"><input type="text" class="espacio" name="nou" disabled></td>
			<td class="hover"><input type="text" class="espacio" name="nou" disabled></td>
			<td class="hover"><input type="text" class="espacio" name="nou" disabled></td>
			
			

			<td><input type="submit" class="button" value="Ingresar nuevo item"></td>
			

		</form>
	</tr>
	
		<tr><td> </td></tr>
	<tr>
		<form method="POST" action="buscar.php" autocomplete="off">
			<td class="hover"><input type="text" class="form-control-lg2 border-0" name="txtNombre"></td>
			<td class="hover"><input type="text" class="form-control-lg2 border-0" name="txtCategoria"></td>
			<td class="hover"><input type="text" class="form-control-lg2 border-0" name="txtEntradas"></td>
			<td class="hover"><input type="text" class="form-control-lg2 border-0" name="txtSalidas"></td>
			<td class="hover"><input type="text" class="espacio" name="nou" disabled></td>
			
			<td><input type="submit" class="button" value="Buscar item"></td>
			

		</form>
	</tr>
	<tr>
		<td class="hover"><input type="text" class="espacio" name="nou" disabled></td>
			<td class="hover"><input type="text" class="espacio" name="nou" disabled></td>
			<td class="hover"><input type="text" class="espacio" name="nou" disabled></td>
			<td class="hover"><input type="text" class="espacio" name="nou" disabled></td>
			<td class="hover"><input type="text" class="espacio" name="nou" disabled></td>
			<td class="hover"><input type="text" class="espacio" name="nou" disabled></td>
			
	</tr>


		</table>
	
	</center>

</body>
</html>