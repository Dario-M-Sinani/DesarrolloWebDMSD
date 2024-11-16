function cargarMenu() {
    var ajax = new XMLHttpRequest();
    ajax.open("GET", "botones.html", true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            document.getElementById("menu").innerHTML = ajax.responseText;
            document.getElementById("mensaje").textContent = 'Siñani Duran Dario Michel     CU:35-5297';
            document.getElementById('mensaje').style.textAlign = 'center';
            document.getElementById('principal').innerHTML = " ";
            document.getElementById('extra').innerHTML = " ";
            document.getElementById('mensaje').style.fontSize = '1.5rem';;
        }
    };
    ajax.send();
}

function cargarGaleria() {
    fetch('galeria.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('principal').innerHTML = data;
            const botonesImagen = document.getElementsByClassName('imagen-boton');
            for (let i = 0; i < botonesImagen.length; i++) {
                botonesImagen[i].addEventListener('click', function() {
                    mostrarImagen(this.dataset.imagen, this.dataset.nombre);
                });
            }
        });
}

function mostrarImagen(imageUrl,imageName) {
    document.getElementById('overlay').style.display = 'flex';
    
    document.getElementById('modalImage').src = imageUrl;
    document.getElementById('mensaje').scr =imageName;
    
    document.getElementById('aceptar').onclick = function() {
        document.getElementById('overlay').style.display = 'none';
    };
}


function pregunta3() {
    var ajax = new XMLHttpRequest();
    ajax.open("GET", "formulario.html", true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            document.getElementById("principal").innerHTML = ajax.responseText;
        }
    };
    ajax.send();
}

function crearPersona() {
    var datos = document.getElementById("respuesta");
    var formulario = document.getElementById("datoslibro");
    var parametros = new FormData(formulario);

    var ajax = new XMLHttpRequest();
    ajax.open("POST", "insertar.php", true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4) {
            if (ajax.status == 200) {
                datos.innerHTML = ajax.responseText; 
                cargarGaleria(); 
            } else {
                datos.innerHTML = "Error en la solicitud: " + ajax.status;
            }
        }
    };
    ajax.send(parametros);
}

function pregunta4() {
    var ajax = new XMLHttpRequest();
    ajax.open("GET", "listar.php", true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            document.getElementById("principal").innerHTML = ajax.responseText;
        }
    };
    ajax.send();
}


function filtrarLibros() {
    const idCarrera = document.getElementById("carreras").value;
    const ajax = new XMLHttpRequest();
    ajax.open("GET", `listar.php?idCarrera=${idCarrera}`, true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            document.getElementById("principal").innerHTML = ajax.responseText;
        }
    };
    ajax.send();
}


function pregunta5() {
    const ajax = new XMLHttpRequest();
    ajax.open("GET", "listacolores.html", true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState === 4 && ajax.status === 200) {
            document.getElementById("principal").innerHTML = ajax.responseText;
        }
    };
    ajax.send();
}
function agregarColor() {
    const color = document.getElementById('colorPicker').value;
    const grilla = document.getElementById('grilla');
    const div = document.createElement('div');
    div.style.width = '50px';
    div.style.height = '50px';
    div.style.margin = '5px';
    div.style.backgroundColor = color;
    div.style.cursor = 'pointer';

    div.addEventListener('click', function () {
        cambiarColorMenu(color);
    });

    grilla.appendChild(div);
}

function cambiarColorMenu(color) {
    const botones = document.querySelectorAll('.menu-boton');
    botones.forEach(boton => {
        boton.style.backgroundColor = color;
    });
}