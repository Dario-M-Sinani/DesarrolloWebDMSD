<?php
include 'conexion.php';
session_start();
include ("acceso.php");
include ("permiso.php");
$id=$_POST['id'];
$fotografia=$_FILES['fotografia'];
$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];
$carnet=$_POST['carnet'];
$sexo=$_POST['sexo'];
$fecha_nacimiento=$_POST['fecha_nacimiento'];
$direccion=$_POST['direccion'];
$mesa_id=$_POST['mesa_id'];
if(isset($_FILES['fotografia']['name'])){
    $nombre=$_FILES['fotografia']['name'];  //obt
$tipo=$_FILES['fotografia']['type'];    //obtiene el tipo de archivo subido
$size= $_FILES['fotografia']['size'];   //obtiene el tamaño del archivo
$temp=$_FILES['fotografia']['tmp_name'];
$arreglo=explode(".", $nombre);
$extension=$arreglo[1];
$nuevonombre=uniqid().".".$extension;//crea un nombre único para el archivo
copy ($temp,"imagen/".$nuevonombre);//copia la imagen a la carpeta "imagen" con su nuevo nombre y extensión

}
$sql="UPDATE padron SET fotografia='$fotografia' ,nombres='$nombres',apellidos='$apellidos',carnet='$carnet',sexo='$sexo',fecha_nacimiento='$fecha_nacimiento',direccion='$direccion',mesa_id=$mesa_id WHERE id=$id";
$resultado=$con->query($sql);

if($resultado){
    ?>
    <h2>Registro actualizado correctamente</h2>
    <meta http-equiv="refresh" content="3;url=read.php">
    <?php
}else{
    echo "Error al actualizar";
}
?>