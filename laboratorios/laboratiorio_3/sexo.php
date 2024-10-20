<style>
    .centrado {
        text-align: center;
        margin-top: 50px;
    }
    table {
        margin: auto;
        width: 600px;
        border-collapse: collapse;
    }
    th, td {
        padding: 10px;
        border: 1px solid #000;
    }
    th {
        background-color: grey;
        color: white;
    }
    .icono {
        width: 50px;
        height: 50px;
    }
</style>

<?php 
include 'conexion.php';

$sql = "SELECT sexo, COUNT(*) as total FROM alumnos GROUP BY sexo";
$resultado = $con->query($sql);

$totales = [
    'varones' => 0,
    'mujeres' => 0
];

while ($fila = $resultado->fetch_assoc()) {
    
    if ($fila['sexo'] === 'M') {
        $totales['varones'] = $fila['total'];
    } elseif ($fila['sexo'] === 'F') {
        $totales['mujeres'] = $fila['total'];
    }
}
?>

<div class="centrado">
    <table>
        <tr>
            <th>Sexo</th>
            <th>Icono</th>
            <th>Total</th>
        </tr>
        <tr>
            <td>Total Varones</td>
            <td><img src="images/icono_varon.png" alt="Icono Varón" class="icono"></td>
            <td><?php echo $totales['varones']; ?></td>
        </tr>
        <tr>
            <td>Total Mujeres</td>
            <td><img src="images/icono_mujer.png" alt="Icono Mujer" class="icono"></td>
            <td><?php echo $totales['mujeres']; ?></td>
        </tr>
    </table>
</div>
