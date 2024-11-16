<?php
include 'conexion_correo.php';

$bandeja = $_GET['bandeja'];

$sql = "SELECT * FROM correos WHERE bandeja = '$bandeja'";
$resultado = $con->query($sql);

?>

<table border="1">
    <thead>
        <tr>
            <th>Correo</th>
            <th>Asunto</th>
            <th>Estado</th>
            <th>Operación</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($correo = $resultado->fetch_assoc()) { ?>
            <tr>

                <td><?php echo $correo['correo'] ?></td>
                <td><?php echo $correo['asunto'] ?></td>
                <td><?php echo $correo['estado'] == 'P' ? 'Pendiente' : 'Enviado' ?></td>
                <td>
                    <div
                        class="button ver"
                        style="
                          background-color: rgb(116, 116, 231);
                          border: 1px solid blue;
                          color: white;
                        "
                        id="<?php echo $correo['id'] ?>">
                        Ver
                    </div>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>