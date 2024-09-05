<?php
include ("conexion.php");

// Ejecutar la consulta SQL para obtener los usuarios
$sql = "SELECT id, email, nivel FROM usuarios";
$resultado = $con->query($sql);
?>

<table border="1">
    <tr>
        <th>Email</th>
        <th>Nivel</th>
        <th>Operaciones</th>
    </tr>
    <?php while ($row = $resultado->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['nivel']; ?></td>
        <td><a href="formupdate_usuarios.php?id=<?php echo $row['id']; ?>">Editar</a></td>
        <td><a href="delete.php?id=<?php echo $row['id']; ?>" >Eliminar</a></td>
    </tr>
    <?php } ?>
</table>

<a href="formcreate_usuarios.html">Registrar uno de nuevo</a>
