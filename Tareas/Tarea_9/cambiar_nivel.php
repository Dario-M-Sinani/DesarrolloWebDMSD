<?php
include 'conexion_biblioteca.php';
session_start();
if (isset($_SESSION['usuario']) && $_SESSION['nivel'] == 1) {
    $id = $_GET['id'];
    $nivel = $_GET['nivel'];
    $sql = "UPDATE usuarios SET nivel=$nivel WHERE id=$id";
    $con->query($sql);
}
