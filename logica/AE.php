<?php
include_once "../Persistencia/conexion.php";
$Id = $_POST['ID'];
$Nombre = $_POST['Nombre'];
$Apellido = $_POST['Apellido'];
$Correo = $_POST['Correo'];
$Contraseña = $_POST['password'];
$tipo = "E";
$query=$bd->prepare('INSERT INTO "Empleado" VALUES (:id, 1, 1, :nombre, :apellido, :correo, :clave, :tipo, 0)');
$query->bindParam(':id', $Id);
$query->bindParam(':nombre', $Nombre);
$query->bindParam(':apellido', $Apellido);
$query->bindParam(':correo', $Correo);
$query->bindParam(':clave', $Contraseña);
$query->bindParam(':tipo', $tipo);
$query->execute();
$query2=$bd->prepare('INSERT INTO "Usuario" VALUES (:idu, :correou, :claveu, :tipou, :nombreu, 1)');
$query2->bindParam(':idu', $Id);
$query2->bindParam(':correou', $Correo);
$query2->bindParam(':claveu', $Contraseña);
$query2->bindParam(':tipou', $tipo);
$query2->bindParam(':nombreu', $Nombre);
$query2->execute();
header('location: ../presentacion/Administrador/tablaEmpleado.php');
