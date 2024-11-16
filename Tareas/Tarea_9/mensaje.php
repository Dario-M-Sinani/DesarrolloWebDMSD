<?php
include 'conexion_correo.php';

$correo = $_GET['id'];

$sql = "SELECT mensaje FROM correos WHERE id = '$correo'";
$resultado = $con->query($sql);
$correo = $resultado->fetch_assoc();

echo json_encode($correo);
