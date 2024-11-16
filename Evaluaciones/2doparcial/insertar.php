<?php
include("conexion.php");

$titulo = $_POST["titulo"];
$autor = $_POST["autor"];
$ideditorial = $_POST["ideditorial"];
$anio = $_POST["anio"];
$idusuario = $_POST["idusuario"];
$idcarrera = $_POST["idcarrera"];

$nombre = $_FILES['imagen']['name'];
$temp = $_FILES['imagen']['tmp_name'];
$arreglo = explode(".", $nombre);
$extension = end($arreglo); 
$nuevonombre = uniqid() . "." . $extension;

if (!copy($temp, "images/" . $nuevonombre)) {
    die("Error al subir la imagen");
}

$sql = "INSERT INTO LIBROS (imagen, titulo, autor, ideditorial, anio, idusuario, idcarrera) 
        VALUES ('$nuevonombre', '$titulo', '$autor', $ideditorial, '$anio', $idusuario, $idcarrera)";

$result = $con->query($sql);
if (!$result) {
    die("Error al insertar datos: " . $con->error);
}

echo "<div>Se insertó con éxito</div>";
?>
