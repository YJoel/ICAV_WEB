import { CrearCuenta } from "../../../api/icavcontrollers/login/crearCuenta/crearCuenta.js";

document
  .getElementById("formCrearCuenta")
  .addEventListener("submit", createAccount);

function createAccount(_objectHTML) {
  _objectHTML.preventDefault();

  const form = new FormData(_objectHTML.target);
  let nombre = form.get("nombre");
  let usuario = form.get("usuario");
  let contrasena = form.get("contrasena");
  let idLider = form.get("cedulaLider")
  
  const createAccount = new CrearCuenta(nombre, usuario, contrasena, idLider);

  let cuentaCreada = createAccount.crear();
  if (cuentaCreada) {
    console.log("Usuario creado correctamente");
  } else {
    console.log("Error al crear usuario");
  }
}
