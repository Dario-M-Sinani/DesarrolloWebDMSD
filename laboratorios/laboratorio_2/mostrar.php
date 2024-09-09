<style>
    table{
        margin:auto ;
        border-collapse: collapse;
    }
    
</style>

<?php
include 'operaciones.php';
session_start();

if (isset($_SESSION['operaciones'])) {
    $operaciones = $_SESSION['operaciones'];
    ?>
    <table border='1'>
        <tr>
            <th style='background-color: red;'>Valor de A</th>
            <th style='background-color: red;'>Valor de B</th>
            <th style='background-color: red;'>Valor de C</th>
        </tr>
        <tr>
            <td><?php echo $operaciones->a; ?></td>
            <td><?php echo $operaciones->b; ?></td>
            <td><?php echo $operaciones->c; ?></td>
        </tr>
        <tr >
            <td style='background-color: red;'>Suma:</td>
            <td colspan=2 ><?php echo $operaciones->calcularSuma(); ?></tr>
        </tr>
        <tr>
            <td style='background-color: red;'>Mayor:</td>
            <td colspan=2 ><?php echo $operaciones->calcularMayor(); ?></td>
        </tr>
        <tr>
            <td style='background-color: red;'>Menor:</td>
            <td colspan=2 ><?php echo $operaciones->calcularMenor(); ?></td>
        </tr>
    </table>
    <?php
}
?>
<meta http-equiv="refresh" content="3;url=menu.html">