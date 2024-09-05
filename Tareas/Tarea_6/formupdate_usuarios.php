<?php
include 'conexion.php';
$id=$_GET['id'];
$sql="SELECT id,email,password,nivel FROM usuarios WHERE id=$id";
$resultado=$con->query($sql);
$fila=$resultado->fetch_assoc();
?>
<form action="update.php" method="post">
    <input type="hidden" name="id" value="<?php echo $fila['id'];?>">
    <label for="email">Email</label>
        <input type="email" name="email"><br>
        <label for="password">Contrasena</label>
        <input type="password" name="password"><br>
        <label for="nivel">Nivel</label>
        <select name="nivel">
            <option value="1">Administrador</option>
            <option value="2">usuario</option>
        </select><br>
        <input type="submit" value="enviar datos">
    
    <input type="submit" value="Actualizar">
</form>