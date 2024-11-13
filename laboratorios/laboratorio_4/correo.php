

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cliente de Correo Web</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="contegen">
<div class="botones" id="app">
    <button onclick="mostrarRedactar()" >Redactar</button>
    </div>
    <div class="sectio">
    <div class="botones2" id="app">
    <button onclick="mostrarBandeja('entrada')" style="border: 2px solid blue; background-color:beige;">Bandeja de Entrada</button>
    <button onclick="mostrarBandeja('salida')"style="border: 2px solid red; background-color:beige;">Bandeja de Salida</button>
    </div>
<div class="contenido" id="contenido"></div>
</div>
<div id="modal" style="display: none;">
    <div id="modal-content"></div>
    <button onclick="cerrarModal()">Cerrar</button>
</div>
</div>
<div id="modalMensaje" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5); justify-content: center; align-items: center;">
    <div style="background: white; padding: 20px; width: 300px; border-radius: 5px; position: relative;">
        <h2>Mensaje</h2>
        <p id="modalMensajeTexto"></p>
        <button onclick="cerrarModal()">Cerrar</button>
        <br><br>
    </div>
</div>

<script src="script2.js"></script>
</body>
</html>
