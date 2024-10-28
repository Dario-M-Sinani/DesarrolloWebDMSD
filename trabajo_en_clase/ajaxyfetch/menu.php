<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .contenedor {
            width: 900px;
            border: 2px solid black;
            margin: auto;
            display: flex;
            flex-direction: column;
        }
        main {
            display: flex;
        }
        .barralat {
            display: flex;
            flex-direction: column;
            width: 20%;
            border: 1px solid black;
            align-items: center;
        }
        .titulo {
            width: 100%;
            background-color: orangered;
            color: white;
            text-align: center;   
        }
        .contenido {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 80%;
        }
        footer {
            background-color: salmon;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <main>
            <div class="barralat">
                <div class="titulo">Opciones</div>

                <select name="meses" id="meses">
                    <option value="1">Enero</option>
                    <option value="2">Febrero</option>
                    <option value="3">Marzo</option>
                    <option value="4">Abril</option>
                    <option value="5">Mayo</option>
                    <option value="6">Junio</option>
                    <option value="7">Julio</option>
                    <option value="8">Agosto</option>
                    <option value="9">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                </select>

                <?php
                function generarSelectAnios() {
                    $html = '<select name="anio" id="anio">';
                    for ($anio = 1975; $anio <= 2024; $anio++) {
                        $html .= "<option value=\"$anio\">$anio</option>";
                    }
                    $html .= '</select>';
                    return $html;
                }
                echo generarSelectAnios();
                ?>
            </div>

            <div class="contenido" id="contenido">
                Selecciona un mes y año.
            </div>
        </main>
        <footer>
            <div class="pie">Sucre - Semestre 2-2024</div>
        </footer>
    </div>

    <script src="fetch.js"></script>
</body>
</html>
