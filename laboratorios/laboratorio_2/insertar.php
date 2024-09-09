<?php
include 'operaciones.php';
session_start();
$a = $_GET['a'];
$b = $_GET['b'];
$c = $_GET['c'];

$operaciones = new Operaciones($a, $b, $c);
$_SESSION['operaciones'] = $operaciones;

?>
<meta http-equiv="refresh" content="3;url=menu.html">