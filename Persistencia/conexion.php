<?php
$contraseña = "YIhBeFKIduX2waXqYbCVknPApPO9lNXR";
$usuario = "mblffhll";
$nombreBaseDeDatos = "mblffhll";
$rutaServidor = "fanny.db.elephantsql.com";
$puerto = "5432";
try {
    $bd = new PDO("pgsql:host=$rutaServidor;port=$puerto;dbname=$nombreBaseDeDatos", $usuario, $contraseña);
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $bd;
    echo("SIII");
} catch (Exception $e) {
    echo "Ocurrió un error con la base de datos: " . $e->getMessage();
}

?>  