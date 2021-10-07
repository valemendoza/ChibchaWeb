<?php
$contraseña = "YIhBeFKIduX2waXqYbCVknPApPO9lNXR";
$usuario = "mblffhll";
$nombreBaseDeDatos = "mblffhll";
$rutaServidor = "fanny.db.elephantsql.com";
$puerto = "5432";
try {
    $base_de_datos = new PDO("pgsql:host=$rutaServidor;port=$puerto;dbname=$nombreBaseDeDatos", $usuario, $contraseña);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo("SIII");
} catch (Exception $e) {
    echo "Ocurrió un error con la base de datos: " . $e->getMessage();
}

?>  