<?php
$a=$_POST['a'];
$b=$_POST['b'];
setcookie('a',$a,0);
setcookie('b',$b,0);
?>

<ul>
    <li><a href="resultado.php?operacion=suma">suma</a></li>
    <li><a href="resultado.php?operacion=resta">resta</a></li>
    <li><a href="resultado.php?operacion=multiplicacion">multiplicacion</a></li>
</ul>