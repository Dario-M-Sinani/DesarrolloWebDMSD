<?php
include ("conexion.php");
$sql="SELECT id,email , password,nivel from usuarios";
$resultado=$con->query($sql);
?>
<table>
    <tr>
        <th>Email</th>
        <th>Nivel</th>
        <th>Operaciones</th>
    </tr>
    <?php while($row=$resultado->fetch_assoc())
    { ?>
    <tr>
        <td><?php echo $row['email'];?></td>
        <td><?php echo $row['nivel'];?></td>
        <td><a href="formupdate_usuarios.php">Editar</a></td>
        <td><a href="delete.php">Eliminar</a></td>
    </tr>
    <?php }?>
</table>
<a href="formcreate_usuarios.html">Registrar uno de muevo</a>
