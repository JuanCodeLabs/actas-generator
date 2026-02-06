<?php
require_once 'conexion.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $ingresado = intval($_POST['ingresado']);
    
    $stmt = $conexion->prepare("UPDATE actas SET ingresado = ? WHERE id = ?");
    $stmt->bind_param("ii", $ingresado, $id);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Estado actualizado correctamente']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al actualizar el estado']);
    }
    
    $stmt->close();
    $conexion->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
}
?>
