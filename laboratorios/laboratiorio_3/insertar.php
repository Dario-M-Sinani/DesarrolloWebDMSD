<?php 
include 'conexion.php';
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$cu = $_POST['cu'];
$sexo = $_POST['sexo'];
$codigocarrera = $_POST['codigocarrera'];
$fotografias = $_FILES['fotografia'];

for ($i = 0; $i < 4; $i++) { 
    $nombreArchivo = $fotografias['name'][$i]; 
    $temp = $fotografias['tmp_name'][$i]; // Ruta temporal
    $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION); 
    $nuevoNombre = uniqid() . "." . $extension; 
    copy($temp, "images/" . $nuevoNombre); 

    $sql = "INSERT INTO alumnos (nombres, apellidos, cu, sexo, codigocarrera, fotografia) 
            VALUES ('$nombres[$i]', '$apellidos[$i]', '$cu[$i]', '$sexo[$i]', '$codigocarrera[$i]', '$nuevoNombre')";

    $resultado = $con->query($sql);

    if (!$resultado) {
        echo "Error al insertar los datos: " . $con->error; 
    }
}

echo "<h1>Datos insertados correctamente</h1>";
echo "<meta http-equiv='refresh' content='3; url=mostrar.php'>";
$con->close();
?>
