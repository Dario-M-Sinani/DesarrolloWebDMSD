<?php
include 'conexion.php';
$sql = "SELECT imagen, titulo FROM libros";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="galeria">';
    
    while ($row = mysqli_fetch_assoc($result)) {
        $imageUrl = "images/" . $row['imagen'];
        $imageName = $row['titulo'];
        echo "<button class=\"imagen-boton\" data-imagen=\"$imageUrl\" data-nombre=\"$imageName\">
                <img class=\"imagen-libro\" src=\"$imageUrl\" alt=\"$imageName\" />
                <p>$imageName</p>
              </button>";
    }

    echo '</div>';
} else {
    echo "0 results";
}
?>
<link rel="stylesheet" href="style.css">