function mostrarBandeja(tipo) {
    fetch(`correo2.php?accion=obtener&tipo=${tipo}`)
        .then(response => response.json())
        .then(data => {
            let html = '<table><tr><th>Correo</th><th>Asunto</th><th>Estado</th><th>Operación</th></tr>';
            data.forEach(correo => {
                let estado = correo.estado === 'E' ? 'Enviado' : (correo.estado === 'P' ? 'Pendiente' : correo.estado);
                
                html += `<tr>
                    <td>${correo.correo}</td>
                    <td>${correo.asunto}</td>
                    <td>${estado}</td> <!-- Aquí mostramos "Enviado" o "Pendiente" -->
                    <td><button onclick="verMensaje(${correo.id})">Ver</button></td>
                </tr>`;
            });
            html += '</table>';
            document.getElementById('contenido').innerHTML = html;
        })
        .catch(error => console.log('Error al obtener los correos:', error));
}

function verMensaje(id) {
    fetch(`correo2.php?accion=ver&id=${id}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('modalMensajeTexto').innerText = data.mensaje;
            document.getElementById('modalMensaje').style.display = 'flex'; 
        })
        .catch(error => console.log('Error al obtener el mensaje:', error));
}

function cerrarModal() {
    document.getElementById('modalMensaje').style.display = 'none';
}

function mostrarRedactar() {
    document.getElementById('contenido').innerHTML = `
        <form id="formCorreo" onsubmit="enviarCorreo(event)">
            <input type="email" id="correo" placeholder="Correo" required><br>
            <input type="text" id="asunto" placeholder="Asunto" required><br>
            <textarea id="mensaje" placeholder="Mensaje"></textarea><br>
            <button type="submit">Enviar</button>
        </form>
    `;
}

function enviarCorreo(event) {
    event.preventDefault();

    const correo = document.getElementById('correo').value;
    const asunto = document.getElementById('asunto').value;
    const mensaje = document.getElementById('mensaje').value;

    const formData = new FormData();
    formData.append('correo', correo);
    formData.append('asunto', asunto);
    formData.append('mensaje', mensaje);
    formData.append('accion', 'enviar');

    const ajax = new XMLHttpRequest();
    
    ajax.open('POST', 'correo2.php', true);

    ajax.onload = function() {
        if (ajax.status === 200) {
            alert(ajax.responseText); 
            mostrarBandeja('salida'); 
        } else {
            alert('Hubo un error al enviar el correo.');
        }
    };

    ajax.send(formData);
}
