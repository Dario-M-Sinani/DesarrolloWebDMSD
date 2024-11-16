<?php
include 'conexion_correo.php';
session_start();

$correo = $_POST['correo'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];

$sql = "INSERT INTO correos (bandeja, correo, asunto, mensaje, estado) VALUES ('salida', '$correo', '$asunto', '$mensaje', 'E')";
$con->query($sql);
