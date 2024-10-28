document.getElementById('meses').addEventListener('change', actualizarContenido);
document.getElementById('anio').addEventListener('change', actualizarContenido);
        
function actualizarContenido() {
    const mes = document.getElementById('meses').value;
    const anio = document.getElementById('anio').value;

     fetch(`calendario.php?anio=${anio}&mes=${mes}`)
        .then(response => response.text())
        .then(data => {
            document.getElementById('contenido').innerHTML = data;
        })
        .catch(error => {
            document.getElementById('contenido').innerHTML = "Error al cargar el contenido";
            console.error('Error:', error);
        });
}
