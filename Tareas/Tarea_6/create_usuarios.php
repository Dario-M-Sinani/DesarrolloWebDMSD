<?php
include ("conexion.php");

$email = $_POST['email'];
$password = sha1($_POST['password']);
$nivel = $_POST['nivel'];

$sql = "INSERT INTO USUARIOS (email, `password`, nivel) VALUES ('$email', '$password', $nivel)";

$result = $con->query($sql);
if ($result) {
    ?>
    <h2>Datos insertados correctamente</h2>
    <meta http-equiv="refresh" content="5; url=read_usuario.php">
    <?php
} else {
    echo "Error al insertar datos: " . $con->error;
}
?>
