function pregunta1() {
    const ajax = new XMLHttpRequest();
    ajax.open("GET", "tresenraya.html", true); // Solicita el archivo tresenraya.html
    ajax.onreadystatechange = function () {
        if (ajax.readyState === 4 && ajax.status === 200) {
            document.querySelector("#contenido").innerHTML = ajax.responseText; // Cambiar a #contenido
        }
    };
    ajax.send();
}

function pregunta2() {
    const ajax = new XMLHttpRequest();
    ajax.open("GET", "tabla.html", true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState === 4 && ajax.status === 200) {
            document.querySelector("#contenido").innerHTML = ajax.responseText; // Cambiar a #contenido

            // Configuración para funcionalidad de la tabla una vez cargada
            const generarTablaBtn = document.getElementById("generarTabla");

            if (generarTablaBtn) { // Verificar si el botón existe
                generarTablaBtn.onclick = function () {
                    const numero1 = parseInt(document.getElementById("numero1").value);
                    const numero2 = parseInt(document.getElementById("numero2").value);
                    const operacion = document.querySelector('input[name="operacion"]:checked').value;

                    if (!numero1 || !numero2 || !operacion) {
                        alert("Por favor, completa todos los campos.");
                        return;
                    }

                    let resultadoLista = "<ul>"; // Inicia una lista HTML

                    for (let i = 1; i <= 10; i++) {
                        let resultado;
                        let simbolo;
                        switch (operacion) {
                            case "suma":
                                resultado = numero1 + numero2 * i;
                                simbolo = "+";
                                break;
                            case "resta":
                                resultado = numero1 - numero2 * i;
                                simbolo = "-";
                                break;
                            case "multiplicacion":
                                resultado = numero1 * numero2 * i;
                                simbolo = "*";
                                break;
                            case "division":
                                resultado = numero1 / (numero2 * i);
                                simbolo = "/";
                                break;
                        }
                        resultadoLista += `<li>${numero1} ${simbolo} ${numero2 * i} = ${resultado.toFixed(2)}</li>`;
                    }

                    resultadoLista += "</ul>"; // Cierra la lista

                    document.getElementById("Resultado").innerHTML = resultadoLista;
                };
            } else {
                console.error("El botón 'generarTabla' no se encontró en el DOM.");
            }
        }
    };
    ajax.send();
}

  
  function ejercicio2() {
    fetch("ejercicio2.html")
      .then((response) => response.text())
      .then((data) => {
        contenido.innerHTML = data;
      });
  }
  
  function autenticar() {
    let form = document.querySelector("#form_login");
    const data = new FormData(form);
    fetch("autenticar.php", {
      method: "POST",
      body: data,
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.result) {
          getUsers();
        } else {
          alert("Usuario o contraseña incorrectos");
        }
      });
  }
  
  function getUsers() {
    var ajax = new XMLHttpRequest();
    ajax.open("GET", `listar.php`, false);
    ajax.onreadystatechange = function () {
      if (ajax.readyState == 4 && ajax.status == 200) {
        contenido.innerHTML = ajax.responseText;
      }
    };
    ajax.send();
  }
  
  function cambiarNivel(nivel, id) {
    fetch(`cambiar_nivel.php?nivel=${nivel}&id=${id}`)
      .then((response) => response.text())
      .then((data) => {
        getUsers();
      });
  }
  
  function ejercicio4() {
    fetch(`datos.php`)
      .then((response) => response.json())
      .then((data) => {
        contenido.innerHTML = "";
        let select = document.createElement("select");
        select.id = "libros";
        data.forEach((libro) => {
          let option = document.createElement("option");
          option.value = libro.imagen;
          option.innerHTML = libro.titulo;
          select.appendChild(option);
        });
        contenido.appendChild(select);
        let img = document.createElement("img");
        img.id = "imagen";
        img.style.height = "200px";
        img.src = `images/${data[0].imagen}`;
        contenido.appendChild(img);
        select.addEventListener("change", (e) => {
          let img = document.querySelector("#imagen");
          img.src = `images/${e.target.value}`;
        });
      });
  }
  