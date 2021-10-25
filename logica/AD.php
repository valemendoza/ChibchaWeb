<?php
include_once "../Persistencia/conexion.php";
$Id = $_POST ['ID'];
$nombre = $_POST ['Nombre'];
$cantDominios = $_POST ['Cantidad'];
$Extencion = $_POST ['Extencion'];
$query =$bd->prepare('INSERT INTO "Distribuidor" VALUES (:id, :nombre, :cantidad, :extencion)');
$query->bindParam(':id', $Id);
$query->bindParam(':nombre', $nombre);
$query->bindParam('cantidad', $cantDominios);
$query->bindParam('extencion', $Extencion);
$query->execute();
header('location: ../presentacion/Administrador/tablaDistribuidor.php');
