let pantallaInferior = document.querySelector(".inferior");
let pantallaSuperior = document.querySelector(".superior");

let valor1 = undefined;
let valor2 = undefined;
let operacion = undefined;

let teclasNumeros = document.querySelectorAll(".numero");

teclasNumeros.forEach((tecla) => {
  tecla.addEventListener("click", () => {
    pantallaInferior.innerHTML += tecla.innerHTML;
  });
});

let teclasOperaciones = document.querySelectorAll(".operacion");

teclasOperaciones.forEach((tecla) => {
  tecla.addEventListener("click", () => {
    pantallaSuperior.innerHTML = pantallaInferior.innerHTML;
    pantallaInferior.innerHTML = "";
    valor1 = parseFloat(pantallaSuperior.innerHTML);

    operacion = tecla.innerHTML;
  });
});

let botonRaiz = document.querySelector("#raiz");
botonRaiz.addEventListener("click", () => {
  let valor = parseFloat(pantallaInferior.innerHTML);
  if (isNaN(valor)) {
    pantallaInferior.innerHTML = "Error";
    return;
  }
  pantallaSuperior.innerHTML = `√${valor}`;
  pantallaInferior.innerHTML = Math.sqrt(valor);
});

let botonLog = document.querySelector("#log");
botonLog.addEventListener("click", () => {
  let valor = parseFloat(pantallaInferior.innerHTML);
  if (isNaN(valor) || valor <= 0) {
    pantallaInferior.innerHTML = "Error";
    return;
  }
  pantallaSuperior.innerHTML = `log(${valor})`;
  pantallaInferior.innerHTML = Math.log10(valor);
});

let botonFactorial = document.querySelector("#factorial");
botonFactorial.addEventListener("click", () => {
  let valor = parseInt(pantallaInferior.innerHTML);
  if (isNaN(valor) || valor < 0) {
    pantallaInferior.innerHTML = "Error";
    return;
  }
  pantallaSuperior.innerHTML = `${valor}!`;
  pantallaInferior.innerHTML = factorial(valor);
});

function factorial(n) {
  if (n === 0 || n === 1) return 1;
  let resultado = 1;
  for (let i = 2; i <= n; i++) {
    resultado *= i;
  }
  return resultado;
}

let teclaIgual = document.querySelector("#igual");
teclaIgual.addEventListener("click", () => {
  valor2 = parseFloat(pantallaInferior.innerHTML);
  pantallaSuperior.innerHTML = `${valor1} ${operacion} ${valor2}`;
  resultado = undefined;
  switch (operacion) {
    case "+":
      resultado = valor1 + valor2;
      break;
    case "-":
      resultado = valor1 - valor2;
      break;
    case "*":
      resultado = valor1 * valor2;
      break;
    case "/":
      resultado = valor1 / valor2;
      break;
    case "^":
      resultado = Math.pow(valor1, valor2);
      break;
    default:
      break;
  }
  pantallaInferior.innerHTML = resultado;
  valor1 = resultado;
});


let allClearButton = document.querySelector("#all-clear");
let deleteButton = document.querySelector("#delete");

allClearButton.addEventListener("click", () => {
  valor1 = undefined;
  valor2 = undefined;
  operacion = undefined;
  pantallaInferior.innerHTML = "";
  pantallaSuperior.innerHTML = "";
});

deleteButton.addEventListener("click", () => {
  pantallaInferior.innerHTML = pantallaInferior.innerHTML.slice(0, -1);
});
