<?php include 'conexion.php';
session_start();
include ("acceso.php");
$sql="SELECT p.fotografia,p.id,nombres,apellidos,carnet,sexo,fecha_nacimiento,direccion,numero_mesa FROM padron p
 left join mesa m on p.mesa_id=m.id 
";
if(isset($_GET['buscar'])){

    $palabras="%".$_GET['buscar']."%";
    $sql.=" WHERE nombres like '$palabra' or apellidos like '$palabra' or cast(carnet as varchar(15)) like '$palabra'";
}

if(isset($_GET['ordenar'])){
    $sql.=" order by ".$_GET['ordenar'];
}
$resultado=$con->query($sql);

?>
<ul>
<li>usuario : <?php echo $_SESSION['email'];?> </li>
<li>Nivel: <?php echo $_SESSION['nivel']==1?'Administrador':'Usuario'; ?> </li>
</ul>


<a href="cerrar_session.php">Cerrar Session</a><br>
<br>
<form action="read.php" method="get">
    <input type="hidden" name="ordenar" value="<?php echo $_GET['ordenar'];?>">
    <label for="buscar">Buscar</label>
    <input type="text" name="buscar" id="buscar">
    <input type="submit" value="buscar">
</form><br>

<table border=1>
    <tr>
        <th>Fotografia</th>
        <th><a href="read.php?ordenar=Nombres">Nombres</a></th>
        <th><a href="read.php?ordenar=Apellidos">Apellidos</a></th>
        <th><a href="read.php?ordenar=Carnet">Carnet</a></th>
        <th><a href="read.php?ordenar=Sexo">Sexo</a></th>
        <th><a href="read.php?ordenar=Fecha de nacimiento">Fecha de nacimiento</a></th>
        <th><a href="read.php?ordenar=Direccion">Direccion</a></th>
        <td><a href="read.php?ordenar=Mesa">Mesa</a></th>
        <th><a href="read.php?ordenar=Operaciones">Operaciones</a></th>
    </tr>
    <?php while($fila=$resultado->fetch_assoc()) 
    {?>
    <tr>
        <td> <img src="images/<?php echo $fila['nombres'];  ?>" >   </td>
        <td><?php echo $fila['nombres'];?></td>
        <td><?php echo $fila['apellidos'];?></td>
        <td><?php echo $fila['carnet'];?></td>
        <td><?php echo $fila['sexo'];?></td>
        <td><?php echo $fila['fecha_nacimiento'];?></td>
        <td><?php echo $fila['direccion'];?></td>
        <td><?php echo $fila['numero_mesa'];?></td>
        <td>
        <?php if ($_SESSION['nivel']==1)      
        {?>
        <a href="form_update.php?id=<?php echo $fila['id'];?>">Editar</a> 
        
        <a href="delete.php?id=<?php echo $fila['id'];?>">Eliminar</a>
        <?php }
        ?>
    </tr>

    <?php }?>
   

</table>
<?php if ($_SESSION['nivel']==1)
{
    ?>

<a href="form_create.php">Registrar nuevo</a>
<?php
}