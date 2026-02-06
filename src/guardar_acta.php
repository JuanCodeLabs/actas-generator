<?php
require_once 'conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ingresado = 0;
    $stmt = $conexion->prepare("INSERT INTO actas (fecha_creacion, codigo_tarjeta, rut, nombre, unidad, email, solicita, patente, fono, adquisicion, tipo_usuario, folio, ingresado)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssssss",
        $_POST['fecha_creacion'], $_POST['codigo_tarjeta'], $_POST['rut'], $_POST['nombre'],
        $_POST['unidad'], $_POST['email'], $_POST['solicita'], $_POST['patente'], $_POST['fono'],
        $_POST['adquisicion'], $_POST['tipo_usuario'], $_POST['folio'], $ingresado
    );
    if ($stmt->execute()) {
        header("Location: ../public/index.php?saved=true");
    } else {
        echo "Error al guardar el acta.";
    }
    $stmt->close();
    $conexion->close();
}
?>
