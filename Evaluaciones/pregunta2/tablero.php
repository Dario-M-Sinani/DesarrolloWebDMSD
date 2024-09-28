<?php  
// Obtener los datos del formulario
$numerofilas = $_POST['numerofilas']; 
$numerocolumnas = $_POST['numerocolumnas'];
$fila_bowser = $_POST['fila'] - 1;  // Restamos 1 porque los índices empiezan en 0
$columna_bowser = $_POST['columna'] - 1;  // Restamos 1 porque los índices empiezan en 0
$color = $_POST['color'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablero de Ajedrez</title>
    <style>
        .tablero {
            margin: auto;
            border: 2px solid black;
            width: 900px;
            height: 900px;
            border-collapse: collapse;
        }
        .tablero td {
            width: <?php echo 900 / $numerocolumnas; ?>px;
            height: <?php echo 900 / $numerofilas; ?>px;
            text-align: center;
        }
        .negro {
            background-color: <?php echo $color; ?>;
        }
        .blanco {
            background-color: white;
        }
        .bowser {
            background-color: #FFC000;
        }
    </style>
</head>
<body>

<table class="tablero">
    <?php
    for ($fila = 0; $fila < $numerofilas; $fila++) {
        echo "<tr>";
        for ($columna = 0; $columna < $numerocolumnas; $columna++) {
            if ($fila == $fila_bowser && $columna == $columna_bowser) {
                echo "<td class='bowser'><img src='../images/bowser.png' width='50px' height='50px'></td>";
            } else {
                $clase = (($fila + $columna) % 2 == 0) ? 'blanco' : 'negro';
                echo "<td class='$clase'></td>";
            }
        }
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>

<a href="../principal.html">Inicio</a>