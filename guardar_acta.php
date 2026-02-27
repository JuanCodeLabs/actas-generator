<?php
include_once('conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $conexion->prepare("INSERT INTO actas (fecha_creacion, codigo_tarjeta, rut, nombre, unidad, email, solicita, patente, fono, adquisicion, tipo_usuario, folio)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssss",
        $_POST['fecha_creacion'], $_POST['codigo_tarjeta'], $_POST['rut'], $_POST['nombre'],
        $_POST['unidad'], $_POST['email'], $_POST['solicita'], $_POST['patente'], $_POST['fono'],
        $_POST['adquisicion'], $_POST['tipo_usuario'], $_POST['folio']
    );
    if ($stmt->execute()) {
        header("Location: index.php?saved=true");
    } else {
        header("Location: index.php?error=true&msg=" . urlencode("Error al guardar el acta: " . $stmt->error));
    }
    $stmt->close();
    $conexion->close();
}
?>
