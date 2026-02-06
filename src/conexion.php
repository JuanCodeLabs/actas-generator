<?php
// Conexión a la base de datos
$host = "db";
$user = "root";
$pass = "root123";
$dataBase = "actas_db";

$conexion = new mysqli($host, $user, $pass, $dataBase);
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
