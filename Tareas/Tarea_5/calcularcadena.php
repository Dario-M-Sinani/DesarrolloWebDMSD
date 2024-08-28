<?php
include('claseoperaciones.php');

$cadena = $_POST['cadena'];

$operaciones = new OperacionesCadena($cadena);
?>
<h3>texto invertido</h3>
<?php
$operaciones -> invertir();
?>
<h3>texto en mayuscula</h3>
<?php
$operaciones -> mayusculas();
?>
<h3>texto en minusculas</h3>
<?php
$operaciones -> minusculas();
?>