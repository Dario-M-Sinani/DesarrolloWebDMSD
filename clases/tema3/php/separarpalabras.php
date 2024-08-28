<?php
$oracion="esta es una oracion"
?>
<ul>
    <?php
    $separado = explode(" ",$oracion);

    foreach($separado as $palabra){
        ?>
        <li><?php echo $palabra ?></li>
    <?php
    }
    ?>
</ul>
<?php
foreach ($palabra as $p){
    

}
$invertido = str