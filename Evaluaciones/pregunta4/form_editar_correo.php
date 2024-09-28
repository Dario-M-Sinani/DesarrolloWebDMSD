<style>
    .cuadro{
        display:flex;
        flex-direction:column;
        align-items:center;
        text-align:center;
        width:600px ;
        height: 200px;
        margin:auto;
        border:4px solid #0070C0;
        box-shadow:1px solid black;
        input{
           border: 4px solid #0070C0 
        }
        & .boton{

            input[type="submit"]{
                background-color: #0070C0;
                color:white;

            }
        }
        }
</style>

<?php 
include 'conexion.php';

$id=$_GET['id'];
$sql="SELECT id,nombres,apellidos,correo FROM usuarios WHERE id=$id";

$resultado=$con->query($sql);
$fila=$resultado->fetch_assoc();
?>
<div class="cuadro">
    <br><br>
    <form action="update.php" method="post">
    <input type="hidden" name="id" value="<?php echo $fila['id'];?>">
    <label for="nombres">Nombres y apellidos : </label>
    <label for="recuperado"><?php echo $fila['nombres'] . " " . $fila['apellidos'];?></label><br><br>
    <label for="correo">correo</label>
    <input type="email" name="correo" id="correo" value='<?php echo $fila['correo'];?>'><br><br>
    <div class="boton">
    <input type="submit" value="Actualizar">
    </div>
</form>
</div>

