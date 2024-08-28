<?php
$a =$_COOKIE['a'];
$b =$_COOKIE['b'];
$operacion =$_GET['operacion'];

switch($operacion){
    case "suma":
        echo $a+$b;
        break;
    case "resta":
        echo $a-$b;
        break;
    case "multiplicacion":
        echo $a*$b;
        break;
}
