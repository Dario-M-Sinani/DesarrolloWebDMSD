<?php
$con = new mysqli("localhost", "root", "", "bd_elecciones");
if ($con->connect_error) 
    die("conexion fallida jayyy nooo:".$con->connect_error);
?>