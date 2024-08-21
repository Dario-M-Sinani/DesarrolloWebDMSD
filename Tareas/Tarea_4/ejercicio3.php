<?php

$numeros = [15, 28, 3, 42, 7];

$mayor = max($numeros);
$menor = min($numeros);
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        .contenedor{
            display: flex;
            justify-content: center;
            flex-direction: column;
            width: 400px;
            margin:auto;
        }
        .resultado {
            border: 2px solid red;
            padding: 10px;
            width: 150px;
            text-align: center;
            margin: 10px;
        }
    </style>
</head>
<body>
    <div class="contenedor">
    <div class="resultado">
        <strong>Mayor:</strong> <?php echo $mayor; ?>
    </div>

    <div class="resultado">
        <strong>Menor:</strong> <?php echo $menor; ?>
    </div>    
    </div>
    

</body>
</html>
