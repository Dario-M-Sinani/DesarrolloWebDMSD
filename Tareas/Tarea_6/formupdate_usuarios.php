<?php
include 'conexion.php';
$id=$_GET['id'];
$sql="SELECT id,email,password,nivel FROM usuarios WHERE id=$id";
$resultado=$con->query($sql);
$fila=$resultado->fetch_assoc();
?>
<form action="update.php" method="post">
    <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">

    <label for="email">Email</label>
    <input type="email" name="email" value="<?php echo $fila['email']; ?>"><br>

    <label for="password">Contraseña</label>
    <input type="password" name="password" value="<?php echo $fila['password']; ?>"><br>

    <label for="nivel">Nivel</label>
    <select name="nivel">
        <option value="1" <?php if ($fila['nivel'] == 1) echo 'selected'; ?>>Administrador</option>
        <option value="2" <?php if ($fila['nivel'] == 2) echo 'selected'; ?>>Usuario</option>
    </select><br>

    <input type="submit" value="Actualizar">
</form>