<?php
// Configuración de la base de datos
$host = "127.0.0.1";
$usuario = "root";
$password = "";
$database = "actas_db";
$port = 3306;

// Crear conexión
$conexion = new mysqli($host, $usuario, $password, $database, $port);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
