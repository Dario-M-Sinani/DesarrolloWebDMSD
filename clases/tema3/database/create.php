<?php 
include 'conexion.php';


$carpetaDestino = "images/";

// Procesar la subida de fotos y realizar inserciones
for ($i = 0; $i < 4; $i++) { // Cambiar a 4 para insertar 4 registros
    // Asegurarse de que el campo de fotografía existe
    if (isset($_FILES['fotografia']['name'][$i]) && $_FILES['fotografia']['name'][$i] != "") {
        // Obtener el nombre y la ruta temporal del archivo
        $nombreFoto = $_FILES['fotografia']['name'][$i];  
        $tempFoto = $_FILES['fotografia']['tmp_name'][$i]; 

        // Obtener la extensión del archivo y crear un nuevo nombre
        $extension = pathinfo($nombreFoto, PATHINFO_EXTENSION);
        $nuevoNombre = uniqid() . "." . $extension;

        // Mover el archivo a la carpeta de destino
        move_uploaded_file($tempFoto, $carpetaDestino . $nuevoNombre);
    } else {
        $nuevoNombre = null; // Asignar null si no se subió una foto
    }

    // Obtener los datos del formulario
    $nombres = isset($_POST['nombres'][$i]) ? $_POST['nombres'][$i] : '';
    $apellidos = isset($_POST['apellidos'][$i]) ? $_POST['apellidos'][$i] : '';
    $carnet = isset($_POST['carnet'][$i]) ? $_POST['carnet'][$i] : '';
    $sexo = isset($_POST['sexo'][$i]) ? $_POST['sexo'][$i] : '';
    $fecha_nacimiento = isset($_POST['fecha_nacimiento'][$i]) ? $_POST['fecha_nacimiento'][$i] : '';
    $direccion = isset($_POST['direccion'][$i]) ? $_POST['direccion'][$i] : '';
    $mesa_id = isset($_POST['mesa_id'][$i]) ? $_POST['mesa_id'][$i] : 0; // Asignar 0 si no se proporciona

    // Consulta SQL para insertar en la base de datos
    $sql = "INSERT INTO padron (nombres, apellidos, carnet, sexo, fecha_nacimiento, direccion, mesa_id, fotografia) 
            VALUES ('$nombres', '$apellidos', '$carnet', '$sexo', '$fecha_nacimiento', '$direccion', '$mesa_id', '$nuevoNombre')";

    $resultado = $con->query($sql);

    if (!$resultado) {
        echo "Error al insertar los datos para $nombres $apellidos: " . $con->error . "<br>";
    }
}

$con->close();
?>

<h1>Datos insertados correctamente</h1>
<meta http-equiv="refresh" content="3; url=read.php">
