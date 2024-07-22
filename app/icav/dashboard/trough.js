if (localStorage.getItem("idMinisterio") != 1) {
  if (ministerio != localStorage.getItem("idMinisterio")) {
    location.assign("./../");
  }
}

/**
 * showInfoInHTML()
 *
 * Coloca el nombre y el cargo en los perfiles de cada uno de los ministerios
 */
let showInfoInHTML = function () {
  let cargo = document.getElementById("cargo");
  let nombre = document.getElementById("nombre");

  if (localStorage.getItem("idMinisterio") == 1) {
    cargo.innerHTML = `Pastor(a)`;
    nombre.innerHTML = `${localStorage.getItem(
      "nombres"
    )} ${localStorage.getItem("apellidos")}`;
  } else if (localStorage.getItem("idMinisterio") == 12) {
    cargo.innerHTML = `${localStorage.getItem("ministerio")} Pastoral`;
    nombre.innerHTML = `${localStorage.getItem(
      "nombres"
    )} ${localStorage.getItem("apellidos")}`;
  } else {
    cargo.innerHTML = `Líder ${localStorage.getItem("ministerio")}`;
    nombre.innerHTML = `${localStorage.getItem(
      "nombres"
    )} ${localStorage.getItem("apellidos")}`;
  }
};

document.addEventListener("DOMContentLoaded", showInfoInHTML);
