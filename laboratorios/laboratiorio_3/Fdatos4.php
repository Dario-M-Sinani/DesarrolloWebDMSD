<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .formulario {
        width: 300px; /* Ajusta según tu preferencia */
        margin: auto;
    }
    
    label {
        display: block; /* Hace que cada etiqueta esté en una nueva línea */
        margin-bottom: 5px; /* Espacio entre la etiqueta y el campo */
    }
    
    input[type="text"],
    input[type="file"],
    select {
        width: 100%; /* Hace que el campo ocupe todo el ancho disponible */
        padding: 8px;
        margin-bottom: 15px; /* Espacio entre campos */
    }

    input[type="submit"] {
        padding: 10px 15px;
        background-color: blue;
        color: white;
        border: none;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: darkblue;
    }
</style>

</head>
<body>
<?php
include 'conexion.php';
    $sql = "SELECT codigo, carrera FROM carreras";      
    $resultado = $con->query($sql);
    $carreras = [];
    while ($fila = $resultado->fetch_assoc()) {
        $carreras[] = $fila;
    }

    ?>

<div class="cont" >
<form action="insertar.php" method="POST" enctype="multipart/form-data">
    <div class="formulario">
        <h2> 1</h2>
        <label>Fotografía:</label>
        <input type="file" name="fotografia[]"><br>
        <label>Nombres:</label>
        <input type="text" name="nombres[]" required><br>
        <label>Apellidos:</label>
        <input type="text" name="apellidos[]" required><br>
        <label>CU:</label>
        <input type="number" name="cu[]" required><br>
        <label>Sexo:</label>
        <input type="radio" name="sexo[1]" value="Masculino" required> Masculino
        <input type="radio" name="sexo[1]" value="Femenino" required> Femenino<br>
        <label>Carrera:</label>
        <select name="codigocarrera[]" required>
        <?php foreach ($carreras as $carrera) { ?>
                <option value="<?php echo $carrera['codigo']; ?>"><?php echo $carrera['carrera']; ?></option>
            <?php } ?>
        </select><br>
        
        <h2>Alumno 2</h2>
        <label>Fotografía:</label>
        <input type="file" name="fotografia[]"><br>
        <label>Nombres:</label>
        <input type="text" name="nombres[]" required><br>
        <label>Apellidos:</label>
        <input type="text" name="apellidos[]" required><br>
        <label>CU:</label>
        <input type="number" name="cu[]" required><br>
        <label>Sexo:</label>
        <input type="radio" name="sexo[2]" value="Masculino" required> Masculino
        <input type="radio" name="sexo[2]" value="Femenino" required> Femenino<br>
        <label>Carrera:</label>
        <select name="codigocarrera[]" required>
        <?php foreach ($carreras as $carrera) { ?>
                <option value="<?php echo $carrera['codigo']; ?>"><?php echo $carrera['carrera']; ?></option>
            <?php } ?>
        </select><br>
        
        <h2>Alumno 3</h2>
        <label>Fotografía:</label>
        <input type="file" name="fotografia[]"><br>
        <label>Nombres:</label>
        <input type="text" name="nombres[]" required><br>
        <label>Apellidos:</label>
        <input type="text" name="apellidos[]" required><br>
        <label>CU:</label>
        <input type="number" name="cu[]" required><br>
        <label>Sexo:</label>
        <input type="radio" name="sexo[3]" value="Masculino" required> Masculino
        <input type="radio" name="sexo[3]" value="Femenino" required> Femenino<br>
        <label>Carrera:</label>
        <select name="codigocarrera[]" required>
        <?php foreach ($carreras as $carrera) { ?>
                <option value="<?php echo $carrera['codigo']; ?>"><?php echo $carrera['carrera']; ?></option>
            <?php } ?>
        </select><br>
        
        <h2>Alumno 4</h2>
        <label>Fotografía:</label>
        <input type="file" name="fotografia[]"><br>
        <label>Nombres:</label>
        <input type="text" name="nombres[]" required><br>
        <label>Apellidos:</label>
        <input type="text" name="apellidos[]" required><br>
        <label>CU:</label>
        <input type="number" name="cu[]" required><br>
        <label>Sexo:</label>
        <input type="radio" name="sexo[4]" value="Masculino" required> Masculino
        <input type="radio" name="sexo[4]" value="Femenino" required> Femenino<br>
        <label>Carrera:</label>
        <select name="codigocarrera[]" required>
        <?php foreach ($carreras as $carrera) { ?>
                <option value="<?php echo $carrera['codigo']; ?>"><?php echo $carrera['carrera']; ?></option>
            <?php } ?>
        </select><br>
        
        <input type="submit" value="insertar">
        </div>
    </form>
</div>
</body>
</html>
