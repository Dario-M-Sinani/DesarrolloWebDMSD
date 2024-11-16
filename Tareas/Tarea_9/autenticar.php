<?php
session_start();
include 'conexion_biblioteca.php';
$usuario = $_POST['usuario'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND password = SHA1('$password')";
$resultado = $con->query($sql);

if ($resultado->num_rows > 0) {
    $usuario = $resultado->fetch_assoc();
    $_SESSION['usuario'] = $usuario['usuario'];
    $_SESSION['nivel'] = $usuario['nivel'];
    $result = [
        'result' => true,
    ];
    echo json_encode($result);
} else {
    $result = [
        'result' => false,
    ];
    echo json_encode($result);
}
