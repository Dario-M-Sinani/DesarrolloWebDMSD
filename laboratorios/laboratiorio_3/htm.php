<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form{
            width: 100%;
        }
        .cont{
            margin: auto;
            width: 1400px;
            border: 1px solid black;
            
            & .formulario{
                width: 100%;
                display: flex;
                & .tipos{
                    display: flex;
                    width: 20%;
                    justify-content: space-around;  
                    align-items: center;

                }
                
            }
            & .iptoos{
                margin-left: 10px;
                display: flex;
                gap: 10px;
                flex-direction: row;
                & .alums{
                    width: 60px;
                    display: flex;
                    
                    flex-direction: column;
                }
                & .carres{
                    font-size: small;
                    width: 40px;
                }
            }

        }
    </style>
</head>
<body>
<?php
include 'conexion.php';
    $sql = "SELECT codigo, carrera FROM carreras";      
    $resultado = $con->query($sql);
    $carreras = [];
    while ($fila = $resultado->fetch_assoc()) {
        $carreras[] = $fila;
    }

    ?>
    <div class="cont">
        <form action="" method="post"></form>
        <div class="formulario">
                <div class="tipos">Fotografia &nbsp&nbsp&nbsp</div>
                <div class="tipos">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Nombre</div>
                <div class="tipos">&emsp;&emsp;Apellido</div>
                <div class="tipos">CU</div>
                <div class="tipos">Sexo</div>
                <div class="tipos">Carrera</div><br><br>
            </div>
            <div class="iptoos">
                <div class="alums">
                    <label for="">1</label>
                    <label for="">2</label>
                    <label for="">3</label>
                    <label for="">4</label>
                </div>
                <div class="archi">
                    <input type="file" name="fotografia[]"><br>
                    <input type="file" name="fotografia[]"><br>
                    <input type="file" name="fotografia[]"><br>
                    <input type="file" name="fotografia[]"><br>
                </div>
                <div class="noms">
                    <input type="text" name="nombres[]"><br>
                    <input type="text" name="nombres[]"><br>
                    <input type="text" name="nombres[]"><br>
                    <input type="text" name="nombres[]"><br>
                </div>
                <div class="apelli">
                    <input type="text" name="apellidos[]"><br>
                    <input type="text" name="apellidos[]"><br>
                    <input type="text" name="apellidos[]"><br>
                    <input type="text" name="apellidos[]"><br>
                </div>
                <div class="cuss">
                    <input type="number" name="cu[]"><br>
                    <input type="number" name="cu[]"><br>
                    <input type="number" name="cu[]"><br>
                    <input type="number" name="cu[]"><br>
                </div>
                <div class="gems">
                    <input type="radio" name="sexo[1]" value="Masculino" > Masculino
                    <input type="radio" name="sexo[1]" value="Femenino" > Femenino<br>
                    <input type="radio" name="sexo[2]" value="Masculino" > Masculino
                    <input type="radio" name="sexo[2]" value="Femenino" > Femenino<br>
                    <input type="radio" name="sexo[3]" value="Masculino" > Masculino
                    <input type="radio" name="sexo[3]" value="Femenino" > Femenino<br>
                    <input type="radio" name="sexo[4]" value="Masculino" > Masculino
                    <input type="radio" name="sexo[4]" value="Femenino" > Femenino<br>
                </div>
                <div class="carres">
                    <select name="codigocarrera[]" >
                        <?php foreach ($carreras as $carrera) { ?>
                                <option value="<?php echo $carrera['codigo']; ?>"><?php echo $carrera['carrera']; ?></option>
                            <?php } ?>
                            </div><br>
                            <p></p>
                            <p></p>
                            <p></p>
                            <p></p>
                            <p></p>
                            
                            <select name="codigocarrera[]" required>
        <?php foreach ($carreras as $carrera) { ?>
                <option value="<?php echo $carrera['codigo']; ?>"><?php echo $carrera['carrera']; ?></option>
            <?php } ?>
        </select><br>
                    
           
            <input type="submit" value="registrar">
            <button>borrar</button>
            </form>
        
    </div>
</body>
</html>