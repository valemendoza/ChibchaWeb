<?php 

include_once "conexion.php";

$sentencia = $bd->query('SELECT * FROM "Cliente"');
$rtas = $sentencia->fetchAll(PDO::FETCH_OBJ);

        foreach($rtas as $cliente){ 
			echo $cliente-> Nombre ;
        }
?>
