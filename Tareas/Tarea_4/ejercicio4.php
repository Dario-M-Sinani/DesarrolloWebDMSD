<!DOCTYPE html>
<html>
<head>
    <style>
        .tablero {
            margin: auto;
            border: 2px solid black;
            width: 500px;
            height: 500px;
            border-collapse: collapse;
        }
        .tablero td {
            width: 30px;
            height: 30px;
        }
        .negro {
            background-color: black;
        }
        .blanco {
            background-color: white;
        }
    </style>
</head>
<body>

<table class="tablero">
    <?php
    for ($row = 1; $row <= 8; $row++) {
        echo "<tr>";
        for ($col = 1; $col <= 8; $col++) {
            if (($row + $col) % 2 == 0) {
                echo "<td class='negro'></td>";
            } else {
                echo "<td class='blanco'></td>";
            }
        }
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>
