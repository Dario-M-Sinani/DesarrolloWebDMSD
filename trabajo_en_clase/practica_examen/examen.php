<?php
class Examen{
    private $cadena1;
    private $cadena2;

    public function __construct($cadena1, $cadena2) {
        $this->cadena1 = $cadena1;
        $this->cadena2 = $cadena2;
    }


public function cruzar() {
    echo "<h2>Resultado:</h2>";

    $c1_array = str_split($this->cadena1);
    $c2_array = str_split($this->cadena2);

    // Encontrar la letra en común
    $letra_comun = null;
    foreach ($c1_array as $c1_char) {
        if (in_array($c1_char, $c2_array)) {
            $letra_comun = $c1_char;
            break;  
        }
    }

    echo $letra_comun."<br>" ; 
    echo "letra comun es '$letra_comun' coincide con la otra cadena ";
    
    if ($letra_comun !== null) {
        echo "<table border='1' style='border-collapse: collapse;'>";
        
        // Mostrar la cadena 2 en vertical
        foreach ($c2_array as $c2_char) {
            echo "<tr>";
            foreach ($c1_array as $c1_char) {
                if ($c1_char == $letra_comun) {
                    echo "<td style='background-color: blue; color: white;'>$c2_char</td>";
                } elseif ($c2_char == $letra_comun) {
                    echo "<td style='background-color: blue; color: white;'>$c1_char</td>";
                } else {
                    echo "<td></td>";
                }
            }
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No existen letras comunes";
    }
}
}

?>