import { Usuario } from "./Usuario.js";

class CrearCuenta {
  constructor(_nombreLider, _usuario, _contrasena, _idLider) {
    this.usuario = new Usuario(_nombreLider, _usuario, _contrasena);
    this.idLider = _idLider;

    this.formData = new FormData();
    this.formData.append("nombre", _nombreLider);
    this.formData.append("usuario", _usuario);
    this.formData.append("contrasena", _contrasena);
    this.formData.append("idLider", _idLider);

    this.routePhpControllerCrearCuenta = "./BD.php";
    this.header = {
      method: "POST",
      body: this.formData,
    };
  }

  crear() {
    fetch(this.routePhpControllerCrearCuenta, this.header)
      .then((response) => response.json())
      .then((value) => {
        if (value === true) {
          return true;
        } else {
          return false;
        }
      });
  }
}

export { CrearCuenta };
