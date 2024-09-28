<?php
session_start(); 

$_SESSION['a'] = $_GET['a'];
$_SESSION['b'] = $_GET['b'];
$_SESSION['c'] = $_GET['c'];

header("Location: menu.php");
?>
