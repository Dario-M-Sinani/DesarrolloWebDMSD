<?php
include("conexion.php");
header("Content-Type: text/html; charset=utf-8");

$idCarrera = isset($_GET['idCarrera']) ? $_GET['idCarrera'] : '';

$carrerasQuery = "SELECT * FROM carreras";
$carrerasResult = $con->query($carrerasQuery);

if (!$carrerasResult) {
    echo json_encode(["error" => $con->error]);
    exit;
}


while ($row = $carrerasResult->fetch_assoc()) {
    $carreras[] = $row;
}

if ($idCarrera === '') {
    $queryLibros = "SELECT libros.*, carreras.carrera 
                    FROM libros 
                    LEFT JOIN carreras ON libros.idcarrera = carreras.id";
} else {
    $queryLibros = "SELECT libros.*, carreras.carrera 
                    FROM libros 
                    LEFT JOIN carreras ON libros.idcarrera = carreras.id
                    WHERE libros.idcarrera = $idCarrera";
}

$resultLibros = $con->query($queryLibros);
if (!$resultLibros) {
    echo json_encode(["error" => $con->error]);
    exit;
}

$libros = [];
while ($row = $resultLibros->fetch_assoc()) {
    $libros[] = $row;
}

?>
<div>
    <h1>Listado de Libros</h1>
    <label for="carreras">Selecciona una carrera:</label>
    <select id="carreras" onchange="filtrarLibros()">
       <option value=""></option>
        <option value="">Todos</option>
        
        <?php
       
        foreach ($carreras as $carrera) {
            echo "<option value='" . $carrera['id'] . "'>" . $carrera['carrera'] . "</option>";
        }
        ?>
    </select>
</div>

<table border="1" id="tablaLibros" style="width: 100%; margin-top: 20px;">
    <thead>
        <tr>
            <th>Imagen</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Editorial</th>
            <th>Año</th>
            <th>Usuario</th>
            <th>Carrera</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($libros as $libro) {
            echo "<tr>";
            echo "<td><img src='images/{$libro['imagen']}' alt='{$libro['titulo']}' style='width:50px'></td>";
            echo "<td>{$libro['titulo']}</td>";
            echo "<td>{$libro['autor']}</td>";
            echo "<td>{$libro['ideditorial']}</td>";
            echo "<td>{$libro['anio']}</td>";
            echo "<td>{$libro['idusuario']}</td>";
            echo "<td>{$libro['carrera']}</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>


