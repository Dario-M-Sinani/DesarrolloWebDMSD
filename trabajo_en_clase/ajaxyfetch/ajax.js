document.getElementById('meses').addEventListener('change', actualizarContenido);
document.getElementById('anio').addEventListener('change', actualizarContenido);
        
function actualizarContenido() {
    const mes = document.getElementById('meses').value;
    const anio = document.getElementById('anio').value;
    const ajax = new XMLHttpRequest();
    ajax.open('GET', `calendario.php?anio=${anio}&mes=${mes}`, true)
    ajax.onreadystatechange = function() {
        if (ajax.readyState === 4 && ajax.status === 200) {
            document.getElementById('contenido').innerHTML = ajax.responseText;
        } else if (ajax.readyState === 4) {
            document.getElementById('contenido').innerHTML = "Error al cargar el contenido";
            console.error('Error:', ajax.statusText);
        }
    }
    ajax.send();
}