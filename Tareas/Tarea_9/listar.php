<?php
include 'conexion_biblioteca.php';
session_start();
if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
    $nivel = $_SESSION['nivel'];
    $sql = "SELECT * FROM usuarios";
    $resultado = $con->query($sql);

?>
    <table border="1">
        <thead>
            <tr>
                <th>Correos</th>
                <th>Nombre completo</th>
                <th>Nivel</th>
                <?php if ($nivel == 1) { ?>
                    <th>Acciones</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php while ($usuario = $resultado->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $usuario['usuario'] ?></td>
                    <td><?php echo $usuario['nombrecompleto'] ?></td>
                    <td><?php echo $usuario['nivel'] == 1 ? 'Administrador' : "Usuario" ?></td>
                    <?php if ($nivel == 1) { ?>
                        <td>
                            <?php if ($usuario['nivel'] == 1) { ?>
                                <div class="button" style="background-color:gray; color:white" onclick="cambiarNivel(0, <?php echo $usuario['id'] ?>)">
                                    Cambiar a usuario
                                </div>
                            <?php } else { ?>
                                <div class="button" style="background-color:orange; color:white" onclick="cambiarNivel(1, <?php echo $usuario['id'] ?>)">
                                    Cambiar a administrador
                                </div>
                            <?php } ?>
                        </td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } else { ?>
    <h1>No estás registrado</h1>
<?php } ?>