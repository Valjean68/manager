<?php

$usuario='root';
$pass='';
$bd='stock';

try{
	$database=new PDO(
		'mysql:host=localhost;
		dbname='.$bd,
		$usuario,
		$pass

	);

}catch(Exception $e){
	echo '2 pamela';
}

?>