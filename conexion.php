<?php
// Configuración de la base de datos
$host = "localhost";
$usuario = "root";
$password = "";
$database = "actas_db";

// Crear conexión
$conexion = new mysqli($host, $usuario, $password, $database);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
