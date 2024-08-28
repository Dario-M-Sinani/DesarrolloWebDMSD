
<form action="mayor.php" method="post">
<?php
$n = $_POST["n"];
for ($i=0;$i<$n;$i++)
{
?>
<label for="text">Introduce el numero:</label>
<input type="number" name="valor<?php echo $i?>" > <br>

<?php
}
?>
<input type="submit" value="calcular el mayor">
</form>