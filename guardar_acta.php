<?php
function validarRUT($rut) {
    if (!preg_match('/^[0-9]+-[0-9kK]$/', $rut)) {
        return false;
    }
    return true;
}

function validarEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

$conexion = new mysqli("localhost", "root", "", "actas_db");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validar campos requeridos
    $campos_requeridos = ['fecha_creacion', 'codigo_tarjeta', 'rut', 'nombre', 'unidad', 'email', 'solicita', 'patente', 'fono', 'adquisicion', 'tipo_usuario'];
    $errores = [];
    
    foreach ($campos_requeridos as $campo) {
        if (empty($_POST[$campo])) {
            $errores[] = "El campo $campo es requerido";
        }
    }
    
    // Validaciones específicas
    if (!empty($_POST['email']) && !validarEmail($_POST['email'])) {
        $errores[] = "El formato del email no es válido";
    }
    
    if (!empty($_POST['rut']) && !validarRUT($_POST['rut'])) {
        $errores[] = "El formato del RUT no es válido (ej: 12345678-9)";
    }
    
    if (!empty($errores)) {
        session_start();
        $_SESSION['errores'] = $errores;
        $_SESSION['datos_form'] = $_POST;
        header("Location: index.php?error=true");
        exit();
    }
    
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
