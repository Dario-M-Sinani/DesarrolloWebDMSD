<style>
    .centrado{
        & table{
            margin:auto;
            width: 900px;
            height: 200px;
        }
    & th{
    background-color:red; 
    }
    &   .blanco{
        color:white;
    }
    }
    
</style>
<?php 
include 'conexion.php';
$sql="SELECT id,nombres,apellidos,correo FROM usuarios";
$resultado=$con->query($sql);
if(isset($_GET['ordenar'])){
    $sql.=" order by ".$_GET['ordenar'];
}
$resultado=$con->query($sql);
?>

<form action="pregunta4.php" method="get">
<input type="hidden" name="ordenar" value="<?php echo $_GET['ordenar'] ?? ''; ?>">
</form><br>
<div class="centrado">
<table border=1 style= border-collapse:collapse;>
    <tr>
    <th><a class='blanco' href="pregunta4.php?ordenar=Nombres">Nombres</a></th>
    <th><a class='blanco' href="pregunta4.php?ordenar=Apellidos">Apellidos</a></th>
    <th><a class='blanco' href="pregunta4.php?ordenar=Correo">Correo</a></th>
    </tr>
    <?php
    $i = 0; 
    while ($fila = $resultado->fetch_assoc()) { 
        
        $color = $i % 2 == 0 ? "white" : "#FFC000"; 
    ?>
    <tr style="background-color: <?php echo $color; ?>">
        <td><?php echo $fila['nombres']; ?></td>
        <td><?php echo $fila['apellidos']; ?></td>
        <td><a href="form_editar_correo.php?id=<?php echo $fila['id']; ?>"><?php echo $fila['correo']; ?></a></td>
    </tr>
    <?php 
        $i++; 
    } 
    ?>
</table>
</div>

<a href="../principal.html">Inicio</a>