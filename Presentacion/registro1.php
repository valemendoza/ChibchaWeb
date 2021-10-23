<?php
include_once "../Persistencia/conexion.php";

$cedula=$_POST["cedula"];
$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$clave=$_POST["password"];
$email=$_POST["email"];
$Tipo_Usuario="C";


try{ 
$sentencia = $bd->prepare('INSERT INTO "Cliente" 
VALUES (:cedula, :nombre, :apellido,:clave,:email,1,0,0,0,:Tipo_Usuario)');
$sentencia-> bindParam(':nombre', $nombre);
$sentencia-> bindParam(':apellido', $apellido);
$sentencia-> bindParam(':cedula', $cedula);
$sentencia-> bindParam(':clave', $clave);
$sentencia-> bindParam(':email', $email);
$sentencia-> bindParam(':Tipo_Usuario',$Tipo_Usuario);

$sentencia-> execute();

$queryUsuario = $bd -> prepare(' INSERT INTO "Usuario" 
(id_usuario, "Correo", "Clave", "Tipo_Usuario", "Nombre", estado) 
VALUES (:cedula, :email,:clave,:Tipo_Usuario,:nombre,1)');
$queryUsuario-> bindParam(':nombre', $nombre);
$queryUsuario-> bindParam(':cedula', $cedula);
$queryUsuario-> bindParam(':clave', $clave);
$queryUsuario-> bindParam(':email', $email);
$queryUsuario-> bindParam(':Tipo_Usuario',$Tipo_Usuario);

$queryUsuario-> execute();


include "../Logica/pruebaSql.php";
} catch (PDOException $e){
        echo "Error: " . $e->getMessage();
}

header("location:../Presentacion/login.php");  
?>