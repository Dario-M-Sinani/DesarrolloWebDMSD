<?php
include 'conexion.php';

// Obtener correos de una bandeja específica
if (isset($_GET['accion']) && $_GET['accion'] === 'obtener' && isset($_GET['tipo'])) {
    $tipo = $_GET['tipo'];
    $stmt = $con->prepare("SELECT * FROM correos WHERE bandeja = ?");
    $stmt->bind_param("s", $tipo);
    $stmt->execute();
    $result = $stmt->get_result();
    $correos = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($correos);

}

// Enviar un correo
if (isset($_POST['accion']) && $_POST['accion'] === 'enviar') {
    $correo = $_POST['correo'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];
    $estado = 'enviado';
    $bandeja = 'salida';

    $stmt = $con->prepare("INSERT INTO correos (correo, asunto, mensaje, estado, bandeja) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $correo, $asunto, $mensaje, $estado, $bandeja);
    $stmt->execute();
    echo "Correo enviado y guardado en la bandeja de salida.";
}

if (isset($_GET['accion']) && $_GET['accion'] === 'ver' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $con->prepare("SELECT mensaje FROM correos WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $correo = $result->fetch_assoc();
    echo json_encode($correo); 
}

$con->close();
?>
