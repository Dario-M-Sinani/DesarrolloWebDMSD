<?php

$cadena = $_GET["cadena"];

$logitud = strlen($cadena);


?>
<style>
    .centrar{
        margin:auto;
        width: 150px;
        height: 150px;
    }
</style>
<div class="centrar">
<?php
echo strtoupper($cadena)."<br>" ;

for($i=1;$i<$logitud-1;$i++){
    echo substr(strtoupper($cadena), $i,1);
    for($j=1;$j<$logitud+1;$j++){
        echo "&nbsp&nbsp";
    }
    echo substr(strtoupper($cadena), $logitud-$i-1,1)."<br>";
    
}
for($k=1;$k<=$logitud;$k++){
    echo substr(strtoupper($cadena), $logitud-$k,1);
}
?>

</div>