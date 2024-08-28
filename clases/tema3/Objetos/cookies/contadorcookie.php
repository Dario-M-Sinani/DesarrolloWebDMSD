<?php
if(isset($_COOKIE['contador'])){
    $valor=$_COOKIE['contador']+1;
    echo "es la vista $valor";
    setcookie("contador");  
}
else
{
echo "es la visita 1";
setcookie("contador",1,0); 
}
?>