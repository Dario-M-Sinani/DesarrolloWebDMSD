<?php session_start();
include 'conexion.php';
include ("acceso.php");
include ("permiso.php");

$nombre=$_FILES['fotografia']['name'];  //obtenemos el nombre del archivo
$temp=$_FILES['fotografia']['tmp_name']; //obtenemos la ruta del archivo en el servidor
$arreglo=explode(".", $nombre);
$extension=$arreglo[1];// obtengo la extension del archivo
$nuevonobre=uniqid().".".$extension;//Le doy un nuevo nombre de archivo
copy ($temp,"images/".$nuevonobre);//copio el archivo a la carpeta de imagenes

$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];
$carnet=$_POST['carnet'];
$sexo=$_POST['sexo'];
$fecha_nacimiento=$_POST['fecha_nacimiento'];
$direccion=$_POST['direccion'];
$mesa_id=$_POST['mesa_id'];
$sql="INSERT INTO padron (nombres,apellidos,carnet,sexo,fecha_nacimiento,direccion,mesa_id,fotografia) VALUES ('$nombres','$apellidos','$carnet','$sexo','$fecha_nacimiento','$direccion',$mesa_id,$nuevonobre)";
$resultado=$con->query($sql);
if($resultado){?>
<h1>Datos insertados correctamente</h1>
<meta http-equiv="refresh" content="3; url=read.php">
<?php
}else{
    echo "Error al insertar los datos";
}
?>


