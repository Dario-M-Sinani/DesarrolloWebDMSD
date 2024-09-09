
<style>

    table{
        margin:auto ;
        border-collapse: collapse;
        & tr td {
            text-align: center;
        width: 30px;
        height: 30px;
        }

    }
    
</style>

<?php

$filas = $_POST['filas'];
$columnas = $_POST['columnas'];


echo "<table border='1'>";

echo "<tr>";
for ($c = 1; $c <= $columnas; $c++) {
    echo "<th>$c</th>";
}
echo "<th style='font-weight:bold; background-color: red; color:white;'>Filas</th>";
echo "</tr>";

for ($f = 1; $f <= $filas; $f++) {
    echo "<tr>";
    for ($c = 1; $c <= $columnas; $c++) {
        echo "<td>" . ($f * $c) . "</td>";
    }
    echo "<td style='font-weight:bold; background-color: red; color:white;'>$f</td>";
    echo "</tr>";
}


echo "<tr>";
for ($c = 1; $c <= $columnas; $c++) {
    echo "<td  style='font-weight:bold; background-color: red; color:white; '>$c</td>";
}
echo "<td style='background-color: red;'></td>"; 
echo "</tr>";

echo "</table>";
?>