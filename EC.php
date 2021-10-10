<?php
include_once "persistencia/conexion.php";
$nombre = $_POST ['Nombre'];
$apellido = $_POST ['Apellido'];
$correo = $_POST ['Correo'];
$Forma_P = $_POST ['FP'];
$Tipo_P = $_POST ['TP'];
$Tipo_PK = $_POST ['TPK'];
$query = $bd->prepare('UPDATE "Cliente" SET "Nombre" =:nombre, "Apellido" =:apellido WHERE "Id_Cliente" = 1;');
$query -> bindParam(":nombre",$nombre);
$query -> bindParam(":apellido",$apellido);
//$query -> bindParam(":correo", $correo);
$query->execute();
echo "HECHO";