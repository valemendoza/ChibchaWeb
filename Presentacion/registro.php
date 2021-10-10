<?php
include_once "../Persistencia/conexion.php";
try{ 
$sentencia = $bd->prepare('INSERT INTO "Cliente" 
VALUES (:cedula, :nombre, :apellido,:clave,:email,1,0,0,0,:Tipo_Usuario)');
$sentencia-> bindParam(':nombre', $nombre);
$sentencia-> bindParam(':apellido', $apellido);
$sentencia-> bindParam(':cedula', $cedula);
$sentencia-> bindParam(':clave', $clave);
$sentencia-> bindParam(':email', $email);
$sentencia-> bindParam(':Tipo_Usuario',$Tipo_Usuario);

$cedula=$_POST["cedula"];
$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$clave=$_POST["password"];
$email=$_POST["email"];
$Tipo_Usuario="C";
$sentencia-> execute();
<<<<<<< HEAD:Presentacion/registro.php
include "../Logica/pruebaSql.php";}
=======
}
>>>>>>> 1302ffdb42e23d70eaa893f1bdd03f3efa2eb247:registro.php
catch (PDOException $e){
        echo "Error: " . $e->getMessage();
}
?>