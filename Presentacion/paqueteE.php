<?php
include_once "../persistencia/conexion.php";
$paquete = $_POST ['paquetes'];
$plan = $_POST ['plan'];
echo ("El paquete escogido es el numero: ".$paquete);
?><br> <?php
echo ("El plan escogido es el numero: ".$plan);
$query = $bd->prepare('UPDATE "Cliente" SET "Tipo_Plan_Id_Tipo_Plan" ='.$plan.', "Tipo_Paquete_Id_Tipo_Paquete" ='.$paquete.' WHERE "Id_Cliente" = 1;');
$query->execute();
echo "hecho";
/*header("location:inicioCliente.php");*/