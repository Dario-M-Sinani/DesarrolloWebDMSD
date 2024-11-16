let operacionSelect = document.querySelector("#operacion");
let a = document.querySelector("#a");
let b = document.querySelector("#b");
let resultado = document.querySelector("#resultado");
let boton = document.querySelector("#boton");

boton.addEventListener("click", () => {
  const operacion = operacionSelect.value;
  switch (operacion) {
    case "sum":
      resultado.innerHTML = parseInt(a.value) + parseInt(b.value);
      break;
    case "res":
      resultado.innerHTML = parseInt(a.value) - parseInt(b.value);
      break;
    case "mult":
      resultado.innerHTML = parseInt(a.value) * parseInt(b.value);
      break;
    case "div":
      resultado.innerHTML = parseInt(a.value) / parseInt(b.value);
      break;
    default:
      break;
  }
});
