
<?php
$con = new mysqli("localhost", "root", "", "bd_biblioteca");
if ($con->connect_error) 
    die("conexion fallida jayyy nooo:".$con->connect_error);
?>