<style>
    .cuadro {
    width: 150px;
    height: 150px;
    border-radius: 5px;
    border: 2px solid #385d8a; 
    display: flex; 
    justify-content: center; 
    align-items: center;  

}
.cuadro2 {
    width: 150px;
    height: 150px;
    border-radius: 5px;
    border: 2px solid black; 
    display: flex; 
    justify-content: center; 
    align-items: center; 
    flex-direction:column;
}
</style>
<?php   
session_start(); 
include "operaciones.php";
$a = $_SESSION['a'];
$b = $_SESSION['b'];
$c = $_SESSION['c'];
?>
<div class="cuadro2">
<form action="#" method="get">
    <input type="submit" style="background-color: #C60000; color: white" name="sumar" value="Sumar"/>
</form>

<form action="#" method="get">
    <input type="submit" style="background-color: #ffc000; color: white" name="restar" value="Restar"/>
</form>

<form action="#" method="get">
    <input type="submit" style="background-color: #0070c0; color: white" name="multiplicar" value="Multiplicar"/>
</form>

<form action="#" method="get">
    <input type="submit" style="background-color: #92D050; color: white" name="dividir" value="Dividir"/>
</form>
</div>
<br><br><br>
<?php

$operaciones = new Operaciones();
$operaciones->setValores($a, $b, $c); // Establece los valores

if (isset($_GET["sumar"])) {
    echo "<div class='cuadro'>";
    echo "El resultado de la suma de " . $a . " + " . $b . " + " . $c . " es el valor: " . $operaciones->sumar();
    echo "</div>";
}

// Aquí puedes agregar el resto de las operaciones con el mismo estilo si lo deseas
if (isset($_GET["restar"])) {
    echo "<div class='cuadro'>";
    echo "La resta de " . $a . " - " . $b . " - " . $c . " es: " . $operaciones->restar();
    echo "</div>";
}

if (isset($_GET["multiplicar"])) {
    echo "<div class='cuadro'>";
    echo "La multiplicación de " . $a . " * " . $b . " * " . $c . " es: " . $operaciones->multiplicar();
    echo "</div>";
}

if (isset($_GET["dividir"])) {
    echo "<div class='cuadro'>";
    echo "La división de " . $a . " / " . $b . " / " . $c . " es: " . $operaciones->dividir();
    echo "</div>";
}
?>

<div>
    <br>
    <button><a href="../principal.html">Principal</a></button>
</div>
