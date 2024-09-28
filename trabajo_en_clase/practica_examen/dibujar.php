<style>
    table{
        margin:auto;
        width: 200px;
        text-aling:center;
        & tr{
            width: 70px;
            height: 30px;
            color:black;
        }
        & td{
            width: 70px;
            height: 30px;
            color:black;
        }

    }
</style>

<?php
include 'examen.php';

    $cadena1 = $_POST['cadena1'];
    $cadena2 = $_POST['cadena2'];

    $e = new Examen($cadena1, $cadena2);
    $e->cruzar();
    

?>
