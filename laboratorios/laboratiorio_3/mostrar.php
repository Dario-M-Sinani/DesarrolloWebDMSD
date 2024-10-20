<style>
    .centrado {
        text-align: center;
    }
    table {
        margin: auto;
        width: 900px;
        border-collapse: collapse;
        border-color: black;
        
    }
    th {
        background-color: blue;
        color: white;
        padding: 10px;
    }
    td {
        padding: 10px;
    }
    .blanco {
        color: white;
    }
</style>

<?php 
include 'conexion.php';

$sql = "SELECT id, nombres, apellidos, cu, sexo, codigocarrera, fotografia FROM alumnos";
if (isset($_GET['ordenar'])) {
    $sql .= " ORDER BY " . $_GET['ordenar'];
}
$resultado = $con->query($sql);

$sqlCarreras = "SELECT codigo, carrera FROM carreras";
$resultadoCarreras = $con->query($sqlCarreras);
$carreras = [];
while ($fila = $resultadoCarreras->fetch_assoc()) {
    $carreras[$fila['codigo']] = $fila['carrera'];
}
?>

<form action="read.php" method="get">
    <input type="hidden" name="ordenar" value="<?php echo $_GET['ordenar'] ?? ''; ?>">
</form><br>

<div class="centrado">
    <table border="1" >
        <tr>
            <th>Nro</th> 
            <th>Fotografía</th> 
            <th><a class='blanco' href="mostrar.php?ordenar=nombres">Nombres</a></th>
            <th><a class='blanco' href="mostrar.php?ordenar=apellidos">Apellidos</a></th>
            <th><a class='blanco' href="mostrar.php?ordenar=cu">CU</a></th>
            <th><a class='blanco' href="mostrar.php?ordenar=sexo">Sexo</a></th>
            <th><a class='blanco' href="mostrar.php?ordenar=codigocarrera">Carrera</a></th>
        </tr>
        <?php
        $i = 0; 
        while ($fila = $resultado->fetch_assoc()) { 
            $color = $i % 2 == 0 ? "white" : "grey"; 
        ?>
        <tr style="background-color: <?php echo $color; ?>">
            <td><?php echo $i + 1; ?></td> 
            <td><img src="images/<?php echo $fila['fotografia']; ?>" alt="Fotografía de <?php echo $fila['nombres']; ?>" width="50" height="50"></td>
            <td><?php echo $fila['nombres']; ?></td>
            <td><?php echo $fila['apellidos']; ?></td>
            <td><?php echo $fila['cu']; ?></td>
            <td><?php echo $fila['sexo']; ?></td>
            <td><?php echo $carreras[$fila['codigocarrera']] ?? 'N/A'; ?></td>
        </tr>
        <?php 
            $i++; 
        } 
        ?>
    </table>
</div>

<a href="sexo.php">tabla de numero de genero
</a>